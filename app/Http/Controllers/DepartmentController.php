<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Services\DepartmentService;
use Inertia\Inertia;

class DepartmentController extends Controller
{
    public function __construct(
        protected DepartmentService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = $this->service->getAllDepartments();

        return Inertia::render('Departments/Index', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return Inertia::render('Departments/Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $department = $this->service->addDepartment($request);

        return to_route("departments.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $department = $this->service->getDepartment($uuid);

        return Inertia::render("Departments/Details", [
            "department" => $department
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $department = $this->service->getDepartment($uuid);

        return Inertia::render("Departments/Edit", [
            "department" => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $uuid, DepartmentRequest $request)
    {
        $department = $this->service->updateDepartment($uuid, $request);

        return to_route("departments.show", $uuid);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove(string $uuid)
    {
        $department = $this->service->getDepartment($uuid);

        return to_route("departments.index");
    }
}
