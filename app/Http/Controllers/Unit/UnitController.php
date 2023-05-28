<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\unit;
use Auth;
class UnitController extends Controller
{
    public function view()
    {
        $unit_view = unit::all();
        return view('unit.unit_view', compact('unit_view'));
    }
    public function add()
    {
        return view('unit.unit_add_form');
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
        ]);
        $unit_add = new unit();
        $unit_add->name = $request->name;
        $unit_add->created_by = Auth::user()->id;
        $unit_add->save();
        $massage = array(
            'massage' => 'Unit Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('units.view')->with($massage);
    }
    public function edit($id)
    {
        $unit_edit = unit::find($id);
        return view('unit.unit_edit', compact('unit_edit'));
    }
    public function update(Request $request, $id)
    {
        $unit_update = unit::find($id);
        $unit_update->name = $request->name;
        $unit_update->updated_by = Auth::user()->id;
        $unit_update->save();
        $massage = array(
            'massage' => 'Unit Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('units.view')->with($massage);
    }
    public function delete($id)
    {
        $unit_delete = unit::find($id);
        $unit_delete->delete();
        $massage = array(
            'massage' => 'Unit Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('units.view')->with($massage);
    }
}
