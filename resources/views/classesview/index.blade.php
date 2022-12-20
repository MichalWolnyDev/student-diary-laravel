@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Klasy</h2>
            </div>
            <div class="pull-right">
                @can('schoolclass-create')
                <a class="btn btn-success" href="{{ route('classes.create') }}"> Create New subject</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Klasa</th>
            <th width="280px"></th>
        </tr>
        @foreach ($sclasses as $sclass)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $sclass->classname }}</td>
            <td>
                <form action="{{ route('classes.destroy',$sclass->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('classes.show',$sclass->id) }}">Show</a>
                    @csrf
                    @method('DELETE')
                    @can('schoolclass-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $sclasses->links() !!}
@endsection
