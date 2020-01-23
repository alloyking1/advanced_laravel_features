@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if(auth()->user()->is_admin === 0)
                    <div class="card-header">{{'Management Dashboard'}}</div>
                @elseif(auth()->user()->is_admin === 1)
                    <div class="card-header">{{'Logistics Dashboard'}}</div>
                @elseif(auth()->user()->is_admin === 2)
                    <div class="card-header">{{'Super Admin Dashboard'}}</div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as an Administrator!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
