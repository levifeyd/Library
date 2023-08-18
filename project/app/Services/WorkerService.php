<?php

namespace App\Services;

use App\Http\Requests\WorkerRequest;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WorkerService
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show(): Collection
    {
        $workersIds = DB::table('model_has_roles')->where('role_id', 1)
            ->pluck('model_id')
            ->toArray();
        return $this->userRepository->whereIn('id', $workersIds)->get();
    }

    public function store(WorkerRequest $request): void {
        $input = $request->all();
        $password = bcrypt($input['password']);
        $input['password'] = $password;
        $worker = $this->userRepository->create($input);
        $worker->assignRole('worker');
    }

    public function showById(int $id): Model {
        return $this->userRepository->getById($id);
    }

    /**
     * @throws Exception
     */
    public function update(int $id, WorkerRequest $request): void {
        $input = $request->all();
        $password = bcrypt($input['password']);
        $input['password'] = $password;
        $this->userRepository->updateById($id, $input);
    }

    /**
     * @throws Exception
     */
    public function delete(int $id): void {
        try {
            $this->userRepository->deleteById($id);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
