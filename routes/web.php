<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return Inertia::render("Welcome", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
});

Route::get("/dashboard", function () {
    return Inertia::render("Dashboard");
})->middleware(["auth", "verified"])->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name("profile.edit");
    Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
    Route::delete("/profile", [ProfileController::class, "destroy"])->name("profile.destroy");
});

Route::middleware("auth")->group(function () {
    Route::get("/employees", [EmployeeController::class, "index"])->name("employees.index");
});

Route::middleware("auth")->group(function () {
    Route::get("/departments", [DepartmentController::class, "index"])->name("departments.index");
    Route::post("/departments", [DepartmentController::class, "store"])->name("departments.store");
    Route::get("/departments/add", [DepartmentController::class, "add"])->name("departments.add");
    Route::get("/departments/{uuid}", [DepartmentController::class, "show"])->name("departments.show");
    Route::get("/departments/{uuid}/edit", [DepartmentController::class, "edit"])->name("departments.edit");
    Route::put("/departments/{uuid}/edit", [DepartmentController::class, "update"])->name("departments.update");
    Route::delete("/departments/{uuid}", [DepartmentController::class, "delete"])->name("departments.delete");
});

require __DIR__ . "/auth.php";
