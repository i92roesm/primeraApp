<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SegundoControlador extends Controller
{
    function enlaces() {
        return '
        <a href="' . url('segundo/index') . '">index</a><br>
        <a href="' . url('segundo/create') . '">create</a><br>
        <a href="' . url('segundo/store?dato=juan') . '">store</a><br>
        <a href="' . url('segundo/show/12') . '">show</a><br>
        <a href="' . url('segundo/edit/45') . '">edit</a><br>
        <a href="' . url('segundo/update/66?dato=pepe') . '">update</a><br>
        <a href="' . url('segundo/destroy/44') . '">destroy</a><br>
        ';
    }
    public function index() {
        return 'este muestra todos los registros';
    } //read R, all (page)
    public function create() {
        return 'este muestra el formulario con el que voy a dar de <a href="' . url('segundo/store?dato=hola') . '">alta</a> un registro nuevo';
    } //create C, form, ver
    public function store(Request $request) {
        $dato = $request->input('dato');
        return 'este inserta el registro y luego hace un redirect, el dato que recibe es:' . $dato;
    } //create C, sql, no ver, redirección
    public function show($id){
        return 'este muestra el elemento ' . $id;
    } //read R, one
    public function edit($id) {
        return 'este muestra el formulario con el que voy a <a href="' . url('segundo/update/' . $id . '?dato=adios') . '">editar</a> un registro';
    } //update U, form, ver
    public function update(Request $request, $id) {
        $dato = $request->input('dato');
        return 'este edita el registro con el id ' . $id . ' y luego hace un redirect, el dato que recibe es:' . $dato;
    } //update U, sql, no ver, redirección
    public function destroy($id) {
        return 'este borra el registro ' . $id . ' y luego hace un redirect';
    } //delete D, sql, no ver, redirección
    function verplantilla() {
        $datos = [];
        $datos['dato1'] = 'hola';
        $datos['dato2'] = 'mundo';
        $datos['dato3'] = '<h1>mundo</h1>';
        return view('plantilla1.subplantilla.secondmain', $datos);
    }
    function base() {
        return view('base');
    }
}
