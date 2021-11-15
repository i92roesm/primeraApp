@extends('base')

@section('content')
<!-- nuevo 1 -->
<div class="modal" id="modalDelete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Confirm delete?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form id="modalDeleteResourceForm" action="" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Delete resource"/>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- fin nuevo 1 -->
<h1>{{ $enterprise }}</h1>
@isset($message)
    <div class="alert alert-{{ $type ?? 'success' }}" role="alert">
        {{ $message }}
    </div>
@endisset
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"># id</th>
            <th scope="col">name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($resources as $resource)
            <tr>
                <td>
                    {{ $resource['id'] }}
                </td>
                <td>
                    {{ $resource['name'] }}
                </td>
                <td>
                    <a href="{{ url('resource/' . $resource['id']) }}">show</a>
                </td>
                <td>
                    <a href="{{ url('resource/' . $resource['id'] . '/edit') }}">edit</a>
                    <a href="{{ route('resource.edit', $resource['id']) }}">edit</a>
                    <a href="{{ action([App\Http\Controllers\ResourceController::class, 'edit'], $resource['id']) }}">edit</a>
                </td>
                <td>
                    <!-- nuevo 2 -->
                    <form class="deleteForm" action="{{ url('resource/' . $resource['id']) }}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" value="delete 1"/>
                    </form>
                    <a href="#" data-url="{{ url('resource/' . $resource['id']) }}" class="deleteLink" >delete 2</a><br>
                    <a href="javascript: void(0);" data-url="{{ url('resource/' . $resource['id']) }}" data-bs-toggle="modal" data-bs-target="#modalDelete">delete 3</a>
                    <!-- fin nuevo 2 -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ url('resource/create') }}" class="btn btn-primary btn-lg" type="button">Add new resource</a>
<!-- nuevo 3 -->
<form id="deleteResourceForm" action="" method="post">
    @method('delete')
    @csrf
</form>
<!-- fin nuevo 3 -->
@endsection

@section('js')
<!-- nuevo 4 -->
<script src="{{ url('assets/js/delete.js') }}"></script>
<!-- nuevo 4 -->
@endsection