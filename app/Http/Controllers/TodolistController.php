<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Element;

class TodolistController extends Controller
{
    public function index (){
        $list = Element::all();

        return view('todolist',[
            'list' => $list
        ]);
    }

    public function store(Request $request){
        $validData = $request->validate([
            'element' => 'required'
        ]);

        $element = new Element();
        $element->todo = $validData['element'];
        $element->save();

        return redirect('/');
    }

    public function softDelete($id){
        $element = Element::findOrFail($id);
        $element->delete();
        return redirect('/');
    }
}
