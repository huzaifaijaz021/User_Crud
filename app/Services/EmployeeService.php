<?php 
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;



class EmployeeService{
  
//    public  function UploadFile( Request $request){
//         $imageName = time() . '.' . $request->image->extension();
//         $request->image->move(public_path('images'), $imageName);
//         return $imageName;
//     }
      
        public function upload(UploadedFile $file)
        {
            $filename = $file->getClientOriginalName();
            Storage::disk('public')->putFileAs('user_images', $file, $filename);
            return $filename;
        }
}