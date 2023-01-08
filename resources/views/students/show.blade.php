@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
    <h2>Oceny</h2>
    <h3>{{ $student->name }} {{ $student->surname }}</h3>
    <p>Klasa: {{ $student->team_name }}</p>
            </div>
            <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('students.index') }}"> Wróć</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          
    <table class="table table-bordered">
        <tr>
        <th>Przedmiot</th>
        <th>Ocena</th>
        <th>Opis</th>
        <th>Akcje</th>
      </tr>

      @foreach ($grades as $key => $grade)
        <tr>
            <td>{{ $grade->subject_name }}</td>
            <td>{{ $grade->grade }}</td>
            <td>{{ $grade->description }}</td>
            <td>
            <a class="btn btn-primary" href="{{ route('grades.edit',$grade->id) }}">Edycja</a>
            {!! Form::open(['method' => 'DELETE','route' => ['grades.destroy', $grade->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Usuń', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>

        </tr>
        @endforeach

</div>

</div>
@endsection