



<form action='{{url('/cart/')}}' method="post">
    {{ csrf_field() }}
    <input type="hidden" value='{{$product->id}}' name='product_id'/>
    <span class="fa fa-shopping-cart btn  btn-success">
        <input type='submit' class="btn btn-success btn-product" value='Buy & Download'> 
    </span>  
</form>