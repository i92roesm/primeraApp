@extends('plantilla1.index')

@section('cabecera')
<h1>Cabecera</h1>
@endsection

@section('cuerpo')
    <p>This is the main content.</p>
@endsection

@section('pie')
    <hr>
    <p>See you.</p>
@endsection

@section('fin_cuerpo')
    @parent
    Thank you.
@endsection