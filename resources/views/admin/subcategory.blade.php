@extends("admin.layout")

@section("main")
@if(session("message"))
<div class="alert alert-success">
    {{session("message")}}
</div>
@endif
<h1>sub category</h1>
<div class="container-fluid">
    <div class="col-md-6">
        <form action="/subcategoryPost" method="POST">
            @csrf
            <input name="subcategory" type="text" class="form-control my-2" placeholder="enter syb category category">
            <select class="form-control" name="categoryID" id="">
                <option value="">select category</option>
                @foreach($category as $c)
                <option value="{{$c->id }}">{{ $c->category_name }}</option>
                @endforeach

            </select>

            <button type="submit" class="btn btn-success">Add sub Category</button>
        </form>
    </div>

</div>




@endsection