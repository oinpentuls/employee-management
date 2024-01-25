<?php

namespace App\Services;

use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentCollection;
use App\Http\Resources\DepartmentResource;
use App\Repositories\DepartmentRepository;
use InvalidArgumentException;

class DepartmentService
{
    public function __construct(
        private DepartmentRepository $repository
    ) {
    }

    public function getAllDepartments()
    {
        $departments = $this->repository->getAll();

        return new DepartmentCollection($departments);
    }

    public function getDepartment(string $uuid)
    {
        if (empty($uuid)) {
            throw new InvalidArgumentException("uuid cannot be empty");
        }

        $department = $this->repository->getByUuid($uuid);

        return new DepartmentResource($department);
    }

    public function addDepartment(DepartmentRequest $request)
    {
        $validRequest = $request->validated();

        $department = $this->repository->add($validRequest);

        return $department;
    }

    public function updateDepartment(string $uuid, DepartmentRequest $request)
    {
        $validRequest = $request->validated();

        $department = $this->repository->update($uuid, $validRequest);

        return $department;
    }

    public function removeDepartment(string $uuid)
    {
        if (empty($uuid)) {
            throw new InvalidArgumentException("uuid cannot be empty");
        }

        $department = $this->repository->remove($uuid);

        return $department;
    }
}
