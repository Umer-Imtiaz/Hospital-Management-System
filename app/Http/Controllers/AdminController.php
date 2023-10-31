<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\AppointmentNotification;
class AdminController extends Controller
{
    public function addview(){
        if(Auth::id()){
            if(Auth::user()->userType==1){
                return view('admin.add_doctor');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('/login');
        }
      
    }
    public function uploadDoctor(Request $request){
     
        $data = new Doctor;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->phone_no = $request->phone;
        $data->room = $request->room;
        $image = $request->image;

        $imagename = time().'.'.$image->getClientoriginalExtension();
        $request->image->move('doctorImage',$imagename);
        $data->image = $imagename;
        $data->save();
        return redirect()->back()->with('message','Doctor data is successfully entered');
    }
    public function showAppointment(){
        $appoint = Appointment::all();
        if(Auth::id()){
            if(Auth::user()->userType==1){
                return view('admin.show_appointment',compact('appoint'));
            }else{ 
                return redirect()->back();
            }
        }else{
            return redirect('/login');
        }
     
    }
    public function approve($id){
        $appoint = Appointment::find($id);
        $appoint->status = 'Approved';
        $appoint->save();
        return redirect()->back();
       
    }
    public function canceled($id){
        $appoint = Appointment::find($id);
        $appoint->status = 'Cancelled';
        $appoint->save();
        return redirect()->back();
       
    }
    public function showDoctor(){
        $doctors = Doctor::all();
        if(Auth::id()){
           if(Auth::user()->userType==1){
            return view('admin.show_doctor',compact('doctors'));
           }else{
              return redirect()->back();
           }
        }else{
            return redirect('/login');
        }
 
    }
    public function deleteDoctor($id){
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect()->back();
    }
    public function updateDoctor($id){
        $doctor = Doctor::find($id);
        //dd($doctor);
        return view('admin.update_doctor',compact('doctor'));

    } 
    public function editDoctor($id,Request $request){
        $doctor = Doctor::find($id);

        $doctor->name= $request->name;
        $doctor->phone_no = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        if($request->image){
            $image = $request->image;
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('doctorImage',$imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();
        return redirect()->back()->with('message','Doctor record updated successfully');
    }
    public function emailViews($id){

        $data = Appointment::find($id);
        // dd($data);
        return view('admin.email_view',compact('data'));
    }
    public function sendNotification($id,Request $request){

        $data = Appointment::find($id);

        $details = [
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart
        ];
        Notification::send($data,new AppointmentNotification($details));
        return redirect()->back()->with('message','Email is sent');

    }
}
