@extends('plantilla1.main')

@section('cuerpo')
    @parent
    <p>This is the new main content. {{ $dato1 }} {{ $dato2 }} {!! $dato3 ?? 'no está el dato 3' !!}</p>
@endsection