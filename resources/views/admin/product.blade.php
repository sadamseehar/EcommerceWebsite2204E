@extends("admin.layout")

@section("main")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@if(session("message"))
<div class="alert alert-success">
    {{session("message")}}
</div>
@endif
<h1>Product</h1>
<div class="container-fluid">
    <div class="col-md-6">
        <form action="/subcategoryPost" method="POST">
            @csrf
            <input name="product_name" type="text" class="form-control my-2" placeholder="enter poroducrt name">
            <input name="price" type="text" class="form-control my-2" placeholder="enter poroducrt price">
            <input name="decription" type="text" class="form-control my-2" placeholder="enter poroducrt description">
            <input name="quantity" type="number" class="form-control my-2" placeholder="enter poroducrt description">

          


            <select class="form-control" name="" id="category">
                <option value="">select Category</option>
                @foreach($category as $c)
                <option value="{{$c->id}}">{{$c->category_name }}</option>
                @endforeach
            </select>


            <select name="" id="subcate" class="form-control">
                <option value="">select sub category</option>
            </select>

            <button type="submit" class="btn btn-success">Add Product</button>
        </form>
    </div>

</div>

<script>
  $(document).ready(function () {
    $('#category').change(function (e) { 
        e.preventDefault();
        var category = $(this).val();
        // alert(category);

        $.ajax({
            type: "POST",
            url: "subCategoryAjax/",
            data: 
            "categoryID="+category+"&_token = {{csrf_token()}}"
            ,
           
            success: function (response) {
                $('#subcate').html(response);
            }
        });
    });
  });
</script>


@endsection