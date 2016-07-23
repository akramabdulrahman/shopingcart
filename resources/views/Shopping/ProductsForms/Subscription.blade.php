
<form action='{{url('/cart/')}}' method="post">
    {{ csrf_field() }}
    <input type="hidden" value='{{$product->id}}' name='product_id'/>
    <input type="date" name="start" class="form-control"/>
    <input type="date" name="end" class="form-control"/>
    <span class="fa fa-shopping-cart btn  btn-success">
        <input type='submit' class="btn btn-success btn-product" value='subscribe'> 
    </span>  
</form>