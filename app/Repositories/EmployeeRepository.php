<?php
namespace App\Repositories;
use App\Interface\EmployeeInterface;
use App\Models\Employee;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use \App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Storage;
use App\Services\EmployeeService;
use Illuminate\Http\Request;




class EmployeeRepository implements EmployeeInterface{
    protected $employeeServiceData ;

    public function __construct(EmployeeService  $employeeService) {
        $this->employeeServiceData = $employeeService;
    }


    // public function all(){
    //     try{
    //         return Employee::get();
    //     }catch (\Exception $e) {
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }
    // }


    public function store($request) {
        try{
        $userId = Auth::user()->id;
        // $imageName = $this->employeeServiceData->UploadFile($request);

        $employee = new Employee();
        if ($request->hasFile('image')) {
        $imageName = $this->employeeServiceData->upload($request->file('image'));
        $employee->image = $imageName;
        }

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = $request->password;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->salary = $request->salary;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->position = $request->position;
        $employee->user_id = $userId;
        $employee->save();

        $staff = new Staff();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->salary = $request->salary;
        $staff->position = $request->position;
        $staff->employee_id = $employee->id; 
        $staff->user_id = $employee->user_id;
        $staff->save();
    }catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
    }


    
    // public function store($request){
    //     $userId = Auth::user()->id;

    //     $imageName = time().'.'.$request->image->extension();  
    //     $request->image->move(public_path('images'), $imageName);
        
    //     return Employee::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $request->password,
    //         'address' => $request->address,
    //         'image'=> $imageName,
    //         'user_id'=> $userId,
    //     ]);
    // }



    
    public function show(Employee $employee ,$id){
        try{
        return Employee::where('id',$id)->get()->first();
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    

    public function edit($id){
        try{
        return  Employee::where('id', $id)->first();
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    // public function update(EmployeeRequest $request, $id) {
    //     $userId = Auth::user()->id;
    
    //    if ($request->hasFile('image')) {
    //     $imageName = time() . '.' . $request->image->extension();
    //     $request->image->move(public_path('images'), $imageName);
    //     $employee->image = $imageName;   
    //     }
    
    //     $employee = Employee::find($id);
    //     if ($employee) {
    //         $employee->update([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => $request->password,
    //             'address' => $request->address,
    //             'image' => $imageName,
    //             'user_id' => $userId,
    //         ]);
        
    //         return true;
    //     } else {
    //         return false; 
    //     }
    // }        


    public function update($request, $id) {
        try{
        $userId = Auth::user()->id;
        $employee = Employee::find($id);


        if ($request->hasFile('image')) {
        $imageName = $this->employeeServiceData->upload($request->file('image'));
        $employee->image = $imageName;
        }

        if (!$employee) {
            return false;
        }
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = $request->password;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->salary = $request->salary;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->position = $request->position;
        $employee->user_id = $userId;
        $employee->save();

        $staff = Staff::where('employee_id', $employee->id)->first();

        if ($staff) {

            $staff->name = $request->name;
            $staff->email = $request->email;
            $staff->salary = $request->salary;
            $staff->position = $request->position;
            $staff->user_id = $employee->user_id;
            $staff->save();
        }


    }catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}



    
    public function destroy($id){
        try{
        return Employee::where('id', $id)->delete();
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
