<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\ReminderModel;
use Auth;
use Session;

class UserController extends Controller
{
    public function list(){
        $user = UserModel::all();
        return view('userlist',['user'->$user]);
    }

    public function create(){
        return view('create');
    }

    public function loginsubmit(Request $req){
        $user= UserModel::where('email',$req->email )->first();
        if($user->password==$req->password){
            $data = ['id'=>$user->id, 'name'=>$user->name,'email'=>$user->email];
            $req->session()->put('logdata',[$data]);
            return redirect('/home');
        }else{
            return view('loginfailed');
        }
        
    }

    public function home(){
        $user= Session::get('logdata');
        return view('home',['user'=>$user]);
    }

    public function createsubmit(Request $req){
        $user= UserModel::create($req->all());
        if($user){
            return redirect('/login');
        }
    }

    public function setreminder(){
        $user= Session::get('logdata');
        // return $user[0];
        return view('setreminder',['user'=>$user]);
    }

    public function newreminder(Request $req){
        // return $req;
        ReminderModel::create($req->all());
        return view('confirm');
    }

    public function update_reminder(Request $req){
        // return $req;
        ReminderModel::where('id',$req->reminder_id)->update([
            "subject"=> $req->subject,
            "date"=> $req->date,
            "description"=> $req->description,
            "email"=> $req->email,
            "contactNo"=> $req->contactNo,
            "smsNo"=> $req->smsNo,
            "reoccur"=> $req->reoccur
        ]);
        return view('confirm');
    }

    public function viewreminder(){
        $user= Session::get('logdata');
        // return $user;
        $email = $user[0]['email'];
        $reminders = ReminderModel::where('email',$email)->get();
        // return $reminders;
        return view('viewreminder',['reminders'=>$reminders]);
    }

    public function modify($reminderId)
    {
        $reminder = ReminderModel::find($reminderId);

        if (!$reminder) {
            return redirect()->back()->with('error', 'Reminder not found.');
        }
        return view('modifyreminder', ['reminder' => $reminder]);
    }

    public function disable(){
        $user= Session::get('logdata');
        $email = $user[0]['email'];
        $reminders = ReminderModel::where('email',$email)->get();
        return view('disablereminder',['reminders'=>$reminders]);
    }

    public function deletereminder(){
        $user= Session::get('logdata');
        $email = $user[0]['email'];
        $reminders = ReminderModel::where('email',$email)->get();
        return view('deletereminder',['reminders'=>$reminders]);
    }
    public function deletesubmit(Request $req)
    {
        $id= $req->reminder_dropdown;
        $reminder = ReminderModel::find($id);

        if (!$reminder) {
            return redirect()->back()->with('error', 'Reminder not found.');
        }
        $reminder->delete();
        return view('confirm');
    }
}
