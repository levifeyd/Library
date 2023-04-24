<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $workersIds = DB::table('model_has_roles')->where('role_id', 1)
            ->pluck('model_id')->toArray();
        $workers = User::query()->whereIn('id', $workersIds)->get();
        return view('workers.index')->with(['workers'=>$workers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('workers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        $input = $request->all();
        $password = bcrypt($input['password']);
        $input['password'] = $password;

        $worker = User::query()->create($input);
        $worker->assignRole('worker');

        return redirect()->back()->with('status', 'Сотрудник добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $worker = User::query()->findOrFail($id);
        return view('workers.edit')->with([
            'worker'=>$worker
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        $bookCategory = User::query()->findOrFail($id);
        $input = $request->all();
        $password = bcrypt($input['password']);
        $input['password'] = $password;
        $bookCategory->update($input);
        return redirect()->back()->with('status', 'Данные сотрудника изменены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $worker = User::query()->findOrFail($id);
        $worker->delete();
        return redirect()->route('workers.index')->with('status','Сотрудник удален!');

    }
}
