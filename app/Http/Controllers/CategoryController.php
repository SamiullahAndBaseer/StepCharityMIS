<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.inventory.category.all_categories', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=> 0, 'error'=> $validator->errors()->toArray()]);
        }else{
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            return response()->json(['code'=> 1, 'msg'=> 'Category added successfully.']);
        }
    }

    // for update
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=> 0, 'error'=> $validator->errors()->toArray()]);
        }else{
            $category = Category::findOrFail($request->id);
            $category->name = $request->name;
            $category->save();

            return response()->json(['code'=> 1, 'msg'=> 'Category updated successfully.']);
        }
    }

    // delete the category
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return response()->json([
            'status'=> 'success',
        ]);
    }
}
