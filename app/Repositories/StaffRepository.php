<?php
namespace App\Repositories;
use App\Interface\StaffInterface;
use App\Models\Employee;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class StaffRepository implements StaffInterface{
    
     public function all(){
        try{
        $userId = Auth::user()->id;
        return Staff::with('employees')->where('user_id', $userId)->get();
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}