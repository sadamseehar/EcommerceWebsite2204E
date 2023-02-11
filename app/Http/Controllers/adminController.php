<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\Models\Category;
use App\Models\sub_category;

class adminController extends Controller
{
    function login(){
        return view('admin.login');
    }
    function login_post(Request $request){
        $user_name = $request->user_name;
        $password = $request->password;

        $login = DB::table("admin_models")->select('user_name')->where(['user_name'=>$user_name, 'password'=>$password])->first();

        if($login){
            session(['user_name'=>$login->user_name]);
            return view("admin.layout");
        }
        else{
            return redirect()->back()->with('message',"invalid credential");
        }
    }

    
    // function logout()
    // {
    //     session()->forget('username');
        
    //     return view("main.login");
    // }




    function category(){
        return view("admin.category");
    }


    function categoryPost(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category;
        $category->save();

        return redirect()->back()->with("message","category added successfully!");  
    }

    function subcategory()
    {
        $category = Category::all();
        return view("admin.subcategory",compact('category'));
    }

    function subcategoryPost(Request $request)
    {
        $subCategory = new sub_category();
        $subCategory->sub_category = $request->subcategory;
        $subCategory->categoryID = $request->categoryID;
        $subCategory->save();
        return redirect()->back()->with("message","sub category added successfully!");

    }

    function product(){
        $category = Category::all();
        return view("admin.product",compact('category'));
    }

    function subCategoryAjax(Request $request)
    {
        $category = $request->post("categoryID");
        $subcat = sub_category::where('categoryID',$category)->get();

        foreach($subcat as $c)
        {
            echo "<option>".$c->sub_category."</option>";
        }
    }
}
