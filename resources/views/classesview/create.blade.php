@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dodaj klasę</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('classes.index') }}"> Wróć</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('classes.store') }}" method="POST">
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Klasa:</strong>
                    <input type="text" name="classname" class="form-control" placeholder="Klasa">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Zatwierdź</button>
            </div>
        </div>
    </form>
@endsection
