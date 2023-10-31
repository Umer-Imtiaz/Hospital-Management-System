<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
          if(Auth::user()->userType=='0'){
            $doctors = Doctor::all();
            return view('user.home',compact('doctors'));
          }else{
              return view('admin.home');
          }
        }else{
            return redirect()->back();
        }
    }
    public function home(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
            $doctors = Doctor::all();
            return view('user.home',compact('doctors'));
        }
             
      
    }
    public function appointment(Request $request){
         $data = new Appointment;
         $data->name = $request->name;
         $data->email = $request->email;
         $data->phone = $request->number;
         $data->doctor = $request->doctor;
         $data->date = $request->date;
         $data->message = $request->message;
         $data->status = "In progress";
         if(Auth::id()){
         $data->user_id = Auth::user()->id;
         }
         $data->save();
         return redirect()->back()->with('message','Appointment Request Successful.We will contact you soon');

    }
    public function myappointment(Request $request){
        if(Auth::id())
        {            if(Auth::user()->userType=='0'){
           $appoint = Appointment::where('user_id',Auth::user()->id)->get();
            return view('user.my_appointment',compact('appoint'));
            }else{
                return redirect()->back();
            }
 
        }else{
            return redirect()->back();
        }
       
    }
    public function cancelAppoint($id){
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function doctor(){
        $doctors = Doctor::all();


        return view('user.all_doctor',compact('doctors'));
    }
    public function doctor_detail($id){
        $doctor = Doctor::find($id);

        return view('user.doctor_detail',compact('doctor'));

    }
}
