@extends('base')

@section('content')
<h1>{{ $enterprise }}</h1>
@if(old('id') != '')
    <div class="alert alert-danger" role="alert">
        Error. Mira el ID.
    </div>
@endif
<form action="{{ url('resource') }}" method="post">
    @csrf
    <input value="{{ old('id') }}" type="number" name="id" placeholder="#id positive integer" min="1" step="1" required />
    <input value="{{ old('name') }}" type="text" name="name" placeholder="Name of the resource" min-length="5" max-length="30" required />
    <input type="submit" value="Create"/>
</form>

@endsection