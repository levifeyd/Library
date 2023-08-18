<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\WorkerService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkerController extends Controller
{
    private WorkerService $workerService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->workerService = (new WorkerService(new UserRepository()));
    }
    public function index(): View
    {
        return view('workers.index')->with(['workers'=>$this->workerService->show()]);
    }

    public function create(): View
    {
        return view('workers.create');
    }

    public function store(WorkerRequest $request):RedirectResponse
    {
        $this->workerService->store($request);
        return redirect()->back()->with('status', 'Сотрудник добавлен!');
    }

    public function edit(int $id): View|RedirectResponse
    {
        try {
            $worker = $this->workerService->showById($id);
            return view('workers.edit')->with([
                'worker'=>$worker
            ]);
        } catch (Exception $exception) {
            return redirect()->route('dashboard')->with('status','Такой категории книг не существует!');
        }
    }

    public function update(WorkerRequest $request, $id):RedirectResponse
    {
        try {
            $this->workerService->update($id, $request);
            return redirect()->back()->with('status', 'Данные сотрудника изменены!');
        } catch (Exception $exception) {
            return redirect()->back()->with('status','Такого сотрудника не существует!');
        }
    }

    public function destroy($id):RedirectResponse
    {
        try {
            $this->workerService->delete($id);
            return redirect()->route('workers.index')->with('status','Сотрудник удален!');
        } catch (Exception $e) {
            return redirect()->route('workers.index')->with('status','Такого сотрудника не сущесвтует!');
        }
    }
}
