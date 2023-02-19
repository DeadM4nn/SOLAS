@extends('layouts.gray_background_layout')

@section('content')
    <div class="card bg-light mb-3" style="max-width: 25rem;">
        <div class="card-header font-weight-bold" >SOLAS</div>
        <div class="card-body">
            <h5 class="card-title">{{$message}}</h5>
            <p class="card-text">
                <a href="{{ url($link) }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
                    Continue
                </a>
            </p>
        </div>
    </div>
@endsection