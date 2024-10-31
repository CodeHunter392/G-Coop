@extends('layouts.master')
@section('title')
    Bonjour {{ auth()->user()->name }}
@endsection
@section('content')
<div class="row">
    <div class="col-12 p-4">
        <div class="jumbotron ">
                <h1 class="display-3">Bienvenu, <strong>{{auth()->user()->name}} </strong></h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
               
        </div>
    </div>
</div>
@endsection