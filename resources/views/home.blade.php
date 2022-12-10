@extends('layouts.app')

@section('content')
<div class="container">
    WIDOK DLA ADMINA
    <div class="row shadow">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-addteacher-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-addteacher" type="button" role="tab" aria-controls="pills-addteacher"
                    aria-selected="true">Dodaj nauczyciela</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-addstudent-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-addstudent" type="button" role="tab" aria-controls="pills-addstudent"
                    aria-selected="false">Dodaj ucznia</button>
            </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-addteacher" role="tabpanel"
                aria-labelledby="pills-addteacher-tab">rzeczy z dodawania nauczyciela
            </div>
            <div class="tab-pane fade" id="pills-addstudent" role="tabpanel" aria-labelledby="pills-addstudent-tab">
                rzeczy z dodawnaia ucznia</div>
        </div>
    </div>
</div>
<div class="container">
    WIDOK DLA NAUCZYCIELA
    <div class="row shadow">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">Klasa</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">1a</a></li>
                    <li><a class="dropdown-item" href="#">1b</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-schoolclass" role="tabpanel"
                aria-labelledby="pills-schoolclass-tab">rzeczy nauczyciela
            </div>
        </div>
    </div>
</div>
<div class="container">
    WIDOK DLA UCZNIA
    <div class="row shadow">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-grades-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-grades" type="button" role="tab" aria-controls="pills-grades"
                    aria-selected="true">Oceny</button>
            </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-grades" role="tabpanel" aria-labelledby="pills-grades-tab">
                oceny
            </div>
        </div>
    </div>
</div>


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection