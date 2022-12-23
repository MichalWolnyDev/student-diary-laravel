@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Oceny</h2>
            </div>
            <div class="pull-right">
                @can('grade-create')
                <a class="btn btn-success" href="{{ route('grades.create') }}"> Utwórz nową ocenę</a>
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
            <th>Przedmiot</th>
            <th>Ocena</th>
            <th>Opis</th>
            <th width="280px">Akcja</th>
        </tr>
        @foreach ($grades as $grade)
        <tr>
            <td>{{ $grade->subject_name }}</td>
            <td>{{ $grade->grade }}</td>
            <td>{{ $grade->description }}</td>
            <td>
                <form action="{{ route('grades.destroy',$grade->id) }}" method="POST">
                    @can('grade-edit')
                    <a class="btn btn-primary" href="{{ route('grades.edit',$grade->id) }}">Edytuj</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('grade-delete')
                    <button type="submit" class="btn btn-danger">Usuń</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
