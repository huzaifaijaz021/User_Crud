<?php

namespace App\Http\Controllers;
use \App\Http\Requests\EmployeeRequest;
use \App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Interface\EmployeeInterface;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\Log;




use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employeeData;
    public function __construct(EmployeeInterface $employeeRepository){
        $this->employeeData= $employeeRepository;

    }
    // public function list(){
    // $employee= $this->employeeData->all();
    // return view('employee.list', compact('employee'));
    // }

    public function list(){
        return view('employee.list');
    }
    
    public function create(){
        return view('employee.create');
    }

    public function store(EmployeeRequest $request){
       $hello= $this->employeeData->store($request);
        return redirect()->route('employee')->with('Success', 'Employee has been created successfully.');
    }

    public function show(Employee $employee, $id){
        $employee= $this->employeeData->show($employee, $id);
        return view('employee.view', compact('employee'));
    }

    public function edit($id){
        $employee= $this->employeeData->edit($id);
        return view('employee.edit', compact('employee'));
    }


    public function update(EmployeeRequest $request, $id){
       $employee=  $this->employeeData->update($request, $id);
        return redirect()->route('employee')->with('Success', 'Employee Has Been updated successfully');
    }


    public function destroy($id){
        $this->employeeData->destroy($id);
        return redirect()->route('employee')->with('error', 'Employee has been deleted successfully');
    }

    public function userdata(){
        $userdata = auth()->user();
        return view('user', compact('userdata'));
          }

    public function getData(Request $request)
          {
              $draw = $request->get('draw');
              $start = $request->get('start');
              $rowPerPage = $request->get('length');
              $orderArray = $request->get('order');
              $columnNameArray = $request->get('columns');
              $searchArray = $request->get('search');
              $columnIndex = $orderArray[0]['column'];
              $columnName = $columnNameArray[$columnIndex]['data'];
              $columnSortOrder = $orderArray[0]['dir'];
              $searchValue = $searchArray['value'];
          
              try {
                  $query = Employee::query();
          
                  $total = $query->count();
                  
                  if (!empty($searchValue)) {
                      $query->where(function ($query) use ($searchValue) {
                          $query->where('id', 'like', '%' . $searchValue . '%')
                          ->orWhere('name', 'like', '%' . $searchValue . '%')
                          ->orWhere('email', 'like', '%' . $searchValue . '%')
                          ->orWhere('address', 'like', '%' . $searchValue . '%')
                          ->orWhere('phone', 'like', '%' . $searchValue . '%')
                          ->orWhere('salary', 'like', '%' . $searchValue . '%')
                          ->orWhere('position', 'like', '%' . $searchValue . '%')
                          ->orWhere('date_of_birth', 'like', '%' . $searchValue . '%');
                        });
                    }
                    
                  $totalFilter = $query->count();
        
                  $query->orderBy($columnName, $columnSortOrder);
                  $query->skip($start)->take($rowPerPage);
          
                  $arrData = $query->get();
                  $response = array(
                      "draw" => intval($draw),
                      "recordsTotal" => $total,
                      "recordsFiltered" => $totalFilter,
                      "data" => $arrData,
                  );
          
                  return response()->json($response);
              } catch (\Exception $e) {
                  return response()->json(['error' => $e->getMessage()], 500);
              }
          }   
 }
