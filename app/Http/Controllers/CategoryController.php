<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $my_category_data=Category::all();
        $data=compact('my_category_data');
        return view('categories/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('categories/categorys_form') ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
         $request->validate(
               [
                'categoryName'=>'required|unique:categories,name'
               ]
         );

         
        $category= new Category; 
        $category->name=$request['categoryName'];
        $category->is_active=1; 
        $category->save(); 
        return redirect(route('category_index'));
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
    {      $edit= Category::find($id);
         
          $data=compact('edit');
         return view('categories/edit')->with($data) ;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {     $request->validate(

        [
            'categoryName'=>'required|unique:categories,name'
        ]
    );

        $update=Category::find($id);
        $update->name=$request['categoryName'];
         $update->save(); 
         return redirect(url('/category/index')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Category::find($id)->delete();
        return  redirect()->back();

    }
}
