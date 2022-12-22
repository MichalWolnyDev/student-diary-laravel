@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
    <h2>Szczegóły</h2>
            </div>
            <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('teams.index') }}"> Wróć</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Klasa:</strong>
                {{$team->teamname}}
            </div>

    <table class="table table-bordered">
        <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
      </tr>
        @foreach ($students as $key => $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->surname }}</td>

        </tr>
        @endforeach
</div>

</div>
@endsection