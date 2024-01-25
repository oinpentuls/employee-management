<?php

namespace App\Repositories;

use App\Models\Department;
use Ramsey\Uuid\Uuid;

class DepartmentRepository
{
    public function getAll()
    {
        $departments = Department::select(['uuid', 'name', 'description'])
            ->where("user_id", auth()->user()->id)
            ->paginate(15);

        return $departments;
    }

    public function getByUuid(string $uuid)
    {
        $department = Department::select(['uuid', 'name', 'description'])
            ->where("uuid", $uuid)->firstOrFail();

        return $department;
    }

    public function add(array $validRequest)
    {
        $uuid = (string) Uuid::uuid4();
        $validRequest['uuid'] = $uuid;
        $validRequest['user_id'] = auth()->user()->id;

        $department = Department::create($validRequest);

        return $department;
    }

    public function update(string $uuid, array $validRequest)
    {
        $department = $this->getByUuid($uuid);

        $department = $department->update($validRequest);

        return $department;
    }

    public function remove(string $uuid)
    {
        $department = $this->getByUuid($uuid);

        $department->delete();

        return $department;
    }
}
