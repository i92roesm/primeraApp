<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function about() {
        return view('base.about');
    }
    
    function error404() {
        return view('base.404');
    }
    
    function index() {
        //return view('index')->with('ruta', url('about'));
        //return view('index')->with('ruta', route('acerca'));
        //return view('index')->with('ruta', action([IndexController::class, 'about']));
        return view('index')->with('ruta', 'na');
    }
    
    function parametro(Request $request, $id) {
        return view('base.parametro')->with('id', $id);
    }
    
    function parametroOpcional(Request $request, $id = 'pepe') {
        /*if($id == null) {
            $id = 'sin valor';
        }*/
        return view('base.parametro')->with('id', $id);
    }
    
    function shop() {
        return view('shop.base');
    }
}
