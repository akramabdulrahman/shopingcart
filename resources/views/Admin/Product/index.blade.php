@extends('layouts.app')

@section('Admin shop', 'Products')

@section('sidebar')
@parent
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="products/create"><button class="btn btn-success">New Product</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <td>Name</td>
                <td>Price</td>
                <td></td>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}$</td>
                        <td> 
                            <form  action="{{url('products',$product->id)}}" method="post">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <input type='submit' class="btn btn-danger"  value="Delete"/>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection