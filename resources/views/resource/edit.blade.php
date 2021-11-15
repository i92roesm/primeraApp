@extends('base')

@section('content')
<h1>{{ $enterprise }}</h1>
@if(old('id') != '')
    <div class="alert alert-danger" role="alert">
        No se ha podido editar.
    </div>
@endif
<form action="{{ url('resource/' . $resource['id']) }}" method="post">
    @csrf
    @method('put')
    <input value="{{ old('id', $resource['id']) }}" type="number" name="id" placeholder="#id positive integer" min="1" step="1" required />
    <input value="{{ old('name', $resource['name']) }}" type="text" name="name" placeholder="Name of the resource" min-length="5" max-length="30" required />
    <input type="submit" value="Edit"/>
</form>

@endsection