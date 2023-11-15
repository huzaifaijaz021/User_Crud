<?php

namespace App\Http\Controllers;
use \App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use App\Interface\StaffInterface;
use App\Repositories\StaffRepository;




use Illuminate\Http\Request;

class StaffController extends Controller
{
    private $staffData;

    public function __construct(StaffInterface $staffRepository){
        $this->staffData = $staffRepository;
    }

    public function stafflist(){
        $staff = $this->staffData->all();
        return view('employee.staff', compact('staff'));
    }
}
