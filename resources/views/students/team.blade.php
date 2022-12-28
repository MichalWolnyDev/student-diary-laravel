@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
    <h2>Przypisz ucznia do klasy</h2>
            </div>
            <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('students.index') }}"> Powrót</a>
            </div>
        </div>
    </div>
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Uwaga!</strong> Sprawdź poprawność uzupełnianych danych!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif -->
<form action="{{ route('students.store', ['student_id' => $id]) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Klasa:</strong>
                    <select class="form-select" aria-label="Team" name="team">
                    <option value="" selected>Wybierz klasę:</option>

                    @foreach ($teams as $team)
                <option value="{{ $team->id }}">
                    {{ $team->teamname }}
                </option>
                @endforeach

    </select>
</div>
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Zatwierdź</button>
</div>
</form>
@endsection