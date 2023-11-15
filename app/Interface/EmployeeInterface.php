<?php
namespace App\Interface;
use \App\Http\Requests\EmployeeRequest;
use App\Models\Employee;


Interface EmployeeInterface{
    // public function all();

    public function store(EmployeeRequest $request);

    public function show(Employee $employee, $id);

    public function edit($id);

    public function update(EmployeeRequest $request, $id);

    public function destroy($id);
}