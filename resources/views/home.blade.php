@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row shadow">
        <div class="col-md-2 p-0">
            <side-menu>
                <admin-menu-list></admin-menu-list>
            </side-menu>
            <side-menu>
                <teacher-menu-list></teacher-menu-list>
            </side-menu>
            <side-menu>
                <student-menu-list></student-menu-list>
            </side-menu>
        </div>
        <div class="col-md-10">
            <div>
                ale masz esse byczku
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
