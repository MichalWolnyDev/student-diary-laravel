@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edytuj ocenę</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('grades.index') }}"> Powrót</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Uwaga!</strong> Sprawdź poprawność uzupełnianych danych!<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('grades.update',$grade->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

                <strong>Ocena:</strong>
                <select class="form-select" aria-label="Subject" name="subject">
                    <option value="{{ $grade->subject }}" selected>{{ $grade->subject }}</option>
                    <option value="Przyrka">Przyrka</option>
                    <option value="Majma">Majma</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ocena:</strong>
                <select class="form-select" aria-label="Grade" name="grade">
                    <option value="{{ $grade->grade }}" selected>{{ $grade->grade }}</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Opis:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="description">
                    {{ $grade->description }}
                </textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </div>
    </div>
</form>
@endsection