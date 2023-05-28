<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use Auth;
class CategoryController extends Controller
{
    public function view()
    {
        $category_view = category::all();
        return view('category.category_view', compact('category_view'));
    }
    public function add()
    {
        return view('category.category_add_form');
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
        ]);
        $supplier_add = new category();
        $supplier_add->name = $request->name;
        $supplier_add->created_by = Auth::user()->id;
        $supplier_add->save();
        $massage = array(
            'massage' => 'Category Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.view')->with($massage);
    }
    public function edit($id)
    {
        $category_edit = category::find($id);
        return view('category.category_edit', compact('category_edit'));
    }
    public function update(Request $request, $id)
    {
        $category_update = category::find($id);
        $category_update->name = $request->name;
        $category_update->updated_by = Auth::user()->id;
        $category_update->save();
        $massage = array(
            'massage' => 'category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.view')->with($massage);
    }
    public function delete($id)
    {
        $supplier_delete = category::find($id);
        $supplier_delete->delete();
        $massage = array(
            'massage' => 'category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.view')->with($massage);
    }
}
