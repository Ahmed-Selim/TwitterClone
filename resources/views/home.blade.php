@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <div>
                        @php
                            echo  '<pre>' . json_encode(Auth::user(), JSON_PRETTY_PRINT) . '</pre>' ;
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
