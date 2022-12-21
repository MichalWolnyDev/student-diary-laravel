@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Przedmiot</h2>
            </div>
            <div class="pull-right">
                @can('subject-create')
                <a class="btn btn-success" href="{{ route('subjects.create') }}"> Utwórz nowy przedmiot</a>
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
            <th>Przedmiot</th>
            <th width="280px">Akcja</th>
        </tr>
        @foreach ($subjects as $subject)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $subject->subject }}</td>
            <td>
                <form action="{{ route('subjects.destroy',$subject->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('subjects.show',$subject->id) }}">Pokaż</a>
                    @csrf
                    @method('DELETE')
                    @can('subject-delete')
                    <button type="submit" class="btn btn-danger">Usuń</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $subjects->links() !!}
@endsection
