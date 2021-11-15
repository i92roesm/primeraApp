@extends('base')

@section('content')

<h1>{{ $enterprise }}</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"># id</th>
            <th scope="col">name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                {{ $resource['id'] }}
            </td>
            <td>
                {{ $resource['name'] }}
            </td>
            <td>
                <a href="{{ url('resource') }}">back</a>
                <a href="{{ url()->previous() }}">back</a>
            </td>
        </tr>
    </tbody>
</table>

@endsection