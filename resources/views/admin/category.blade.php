@extends("admin.layout")

@section("main")
@if(session("message"))
<div class="alert alert-success">
    {{session("message")}}
</div>
@endif

<div class="container-fluid">
    <div class="col-md-6">
        <form action="/categoryPost" method="POST">
            @csrf
            <input name="category" type="text" class="form-control" placeholder="enter category">
            <button type="submit" class="btn btn-success">Add Category</button>
        </form>
    </div>

</div>




@endsection