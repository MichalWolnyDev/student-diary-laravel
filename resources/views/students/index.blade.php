@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Lista uczniów</h2>
        </div>
       
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>Nr</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Klasa</th>
        <th width="280px"></th>
    </tr>
@foreach ($data as $key => $student)
{{$student}}
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->surname }}</td>
        @if($student->team_id > 0)
        <td>{{ $student->team_name }}</td>
        @else
        <td>Nie przypisano do żadnej klasy</td>
        @endif
        <td>
        @if($student->team_id == 0)
            <a class="btn btn-info" href="{{ route('students.edit', $student->id) }}">Przypisz do klasy</a>
            @endif
            <!-- <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edycja</a>
                {!! Form::open(['method' => 'DELETE','route' => ['students.destroy', $student->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Usuń', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!} -->
        </td>
    </tr>
@endforeach
</table>
{!! $data->render() !!}
@endsection
