@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>grades</h2>
            </div>
            <div class="pull-right">
                @can('grade-create')
                <a class="btn btn-success" href="{{ route('grades.create') }}"> Create New grade</a>
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
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($grades as $grade)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $grade->name }}</td>
            <td>{{ $grade->detail }}</td>
            <td>
                <form action="{{ route('grades.destroy',$grade->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('grades.show',$grade->id) }}">Show</a>
                    @can('grade-edit')
                    <a class="btn btn-primary" href="{{ route('grades.edit',$grade->id) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('grade-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $grades->links() !!}
@endsection
