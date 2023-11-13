<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\laravel_own;
use File;


class AjaxCrudController extends Controller
{
    public function ajax_crud()
    {
     return view('ajax_crud');
    }
    
    
    public function read()
    {
        $data='<table class="w3-table-all">
        <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Description</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
        </tr>';
        $result=DB::table('laravel_owns')->orderBy('id','DESC')->get();   
        foreach($result as $row) {
              $data.='<tr>
              <td>'.$row->name.'</td>
              <td>'.$row->email.'</td>
              <td>'.$row->phone.'</td>
              <td>'.$row->description.'</td>';

                   $image_url=asset('image/'.$row->image); 

              $data.='<td><img src="'.$image_url.'" style="max;width:70px;"></td>
              <td><span onclick="update_read('.$row->id.')" class="w3-button w3-green w3-small">Edit</span></td>
              <td><span onclick="deleteId('.$row->id.')" class="w3-button w3-red w3-small">Delete</span></td>
        </tr>';
         }
         $data.='</table>';
         //dd($data);
         return response()->json($data);
         //return json_encode(array('data'=>$data));
    }




    public function create(Request $res)
    {
       
        if($res->hasfile('image'))       
        {
            $file=$res->file('image');
            $extention=$file->getClientOriginalExtension();  
            $extensions_arr = array("jpg","jpeg","png","gif");      
            // Check extension
            if( in_array($extention,$extensions_arr) )
            {   
                $filename=uniqid().'.'.$extention;
                $file->move('image',$filename);  //move($destin,$name); //public folder 
            }

            else
            {
                $data ='Only Image file is allowed';
                return response()->json($data);
            }

        }  
        
        
        $create=DB::table('laravel_owns')
        ->insert([
            'name'=>$res->input('name'),
            'email'=>$res->input('email'),
            'phone'=>$res->input('phone'),
            'description'=>$res->input('description'),
            'image'=>$filename
            ]); // Single data
            
        $data='Data Created';
        return response()->json($data); 
       
       
       
       
       
  
      
    }



    public function edit(Request $req)
    {
        $id=$req->input('id');
        $data=DB::table('laravel_owns')->find($id);

        return response()->json($data);
    }



    public function update(Request $res)
    {
        
        if($res->hasfile('image'))       
        {
            $file=$res->file('image');
            $extention=$file->getClientOriginalExtension();  
            $extensions_arr = array("jpg","jpeg","png","gif");      
            // Check extension
            if( in_array($extention,$extensions_arr) )
            {   
                $filename=uniqid().'.'.$extention;
                $file->move('image',$filename);  //move($destin,$name); //public folder
            }
            else
            {
                $data="Only image file is allowed";
                return response()->json($data);
            }

        }               

        //delete old image
        $old=DB::table('laravel_owns')->where('id','=',$res->id)->first();
         if(File::exists(public_path('image/'.$old->image)))
        {
             File::delete(public_path('image/'.$old->image));
        }
        
        
        $update=DB::table('laravel_owns')->where('id',$res->input('id'))
        ->update([
            'name'=>$res->input('name'),
            'email'=>$res->input('email'),
            'phone'=>$res->input('phone'),
            'description'=>$res->input('description'),
            'image'=>$filename
            ]); // Single data

        $data='Data Updated';
        return response()->json($data);    
      
    }


    public function delete(Request $req)
    {
        $id=$req->input('id');
        //delete old image
        $old=DB::table('laravel_owns')->where('id','=',$id)->first();
        if(File::exists(public_path('image/'.$old->image)))
       {
            File::delete(public_path('image/'.$old->image));
       }

        $data=DB::table('laravel_owns')->where('id',$id)->delete();
        $data="Deleted";
        return response()->json($data);
    }
}
