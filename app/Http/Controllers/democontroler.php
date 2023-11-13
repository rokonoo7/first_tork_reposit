<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laravel; 
class democontroler extends Controller
{

  public function session_work( Request $data){
        $session_data= $data->input('username');
        $data->session()->put('username',$session_data); 
        echo session('username');
        
  }
  public  function index(){
        $url=url('/register');
        $title="Form Registration";
        $data=compact('url','title');
        return view('form')->with($data);
    }

    public function register(Request $request)
    {
          $request->validate(
             [
              'username'=>'required',
              'email'=>'required|email|unique:laravel,email',
              'password'=>'required|confirmed',
              'password_confirmation'=>'required',
               'gender' =>'required' 
             ]
             );
         print_r($request->all()); 
         $laravel=new Laravel;
         $laravel->username=$request['username'];
         $laravel->email=$request['email'];
         $laravel->password=md5($request['password']);
         $laravel->gender=$request['gender'];
         $laravel->save();
         return redirect('/form/view');
         
    }

    public function view(){
      $laravel_data=Laravel::all();
      $data=compact('laravel_data');
       return view('form_view')->with($data);
    }
    public function delete($id){
          Laravel::find($id)->delete();
           return redirect()->back();
    } 
    public function edit($id){
      $update_data= Laravel::find($id);
      

      if(is_null($update_data)){
        return redirect()->back();
      }
      else{
          $url=url('/form/update')."/".$id;
          $title="Update Registration";
           $data=compact('update_data','url','title');
           return view('form')->with($data);

           
      }
    }
    public function update($id,Request $request){
       $laravel=Laravel::find($id);
      
       $laravel->username=$request['username'];
       $laravel->email=$request['email'];
       $laravel->gender=$request['gender'];
       $laravel-> save();
       return redirect(url('/form/view'));

    }
}
