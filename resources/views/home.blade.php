@extends('layouts.app')

@section('Shopping thingy', 'shoping')
@section('extracss')
<style>
    *, *:before, *:after {box-sizing:  border-box !important;}


    .row {
        -moz-column-width: 60em;
        -webkit-column-width: 60em;
        -moz-column-gap: 1em;
        -webkit-column-gap:1em; 

    }

    .item {
        display: inline-block;
        padding:  .25rem;
        width:  100%; 
    }

    .well {
        position:relative;
        display: block;
    }
</style>
@endsection
@section('sidebar')
@parent
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach ($products as $product)

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" >
                    <img src="{{$product->imageurl}}" class="img-responsive">
                    <div class="caption">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <h3>{{$product->name}}</h3>
                            </div>
                            <div class="col-md-6 col-xs-6 price">
                                <h3>
                                    <label>${{$product->price}}</label></h3>
                            </div>
                        </div>
                        <p>{{$product->description}}</p>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <!--
                                *@todo make this escaped and include the form here with generic inputs 
                                between all products
                                -->
                                
                                {!! $product->present()->formView !!}         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    @endsection