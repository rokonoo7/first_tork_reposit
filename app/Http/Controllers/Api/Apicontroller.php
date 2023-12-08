<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Api\Apitut;
class Apicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=Validator::make(
            $request->all(),[
                'name' => ['required'],
                'email' => ['required','email','unique:apituts,email'],
                'password'=>['required','confirmed','min:8'],
                'password_confirmation'=>['required']

            ]
        );
        if($validation->fails()){
             return response()->json($validation->messages(),400);
        }
       else{
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>md5($request->password)


        ];


        DB::beginTransaction();
        try{
          $user=  Apitut::create($data);
            DB::commit();
        }catch(\Exception $e){
                 DB::rollBack();
                 p($e->messages());
                 $user=null;

        }
        if($user==null){
            return  response()->json([
                'message'=>'internal server error '
            ], 500);
         }
         else{
            return response()->json([
                'message'=>'Data sent successfully'
            ], 200);
         }
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
