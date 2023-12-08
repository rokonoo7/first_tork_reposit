<?php

namespace App\Http\Controllers;
use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function view(){
          return view('login/signup');
    }
    public function register(Request $request){
        $login=new Login;
           $firstName= $request->input('firstName');
           $lastName=$request->input('lastName');
           $usrName=$firstName.$lastName;
        //    echo $usrName;
           echo $name1=substr($usrName, 0,strlen($firstName));

           echo $name2=substr($usrName,strlen($firstName));
  }
}
