@extends('layouts.app')

@section('title', 'News')

@section('content')


<div class="container-xl">
    <div class="row">
        <div class="col-lg-8">
            @include('partials.post')
            @include('partials.comments')
        </div>
    
        <div class="hidden-md-down col-lg-auto">
        </div>
    </div>
    
</div>


@endsection
