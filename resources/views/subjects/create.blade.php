@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dodaj nowy przedmiot</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Powrót</a>
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
    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Przedmiot:</strong>
                    <input type="text" name="subject" class="form-control" placeholder="Przedmiot">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Dodaj</button>
            </div>
        </div>
    </form>
@endsection
