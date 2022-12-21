@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Pokaż ocenę</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('grades.index') }}"> Powrót</a>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Uczeń:</strong>
                Jan Nowak
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Klasa:</strong>
                A1
            </div>   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Przedmiot:</strong>
                {{ $grade->subject }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ocena:</strong>
                {{ $grade->grade }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Opis:</strong>
                {{ $grade->description }}
            </div>
        </div>
    </div>
@endsection
