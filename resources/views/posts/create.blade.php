@extends('layouts.sites')

@section('content')
<h1 class="text-center">Maqola qo'shish</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
@endif
<form action="{{route('posts.store')}}" method="POST">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label  class="form-label">Title</label>
        <input type="text" class="form-control"  name="title">
    </div>
    <div class="mb-3">
        <label  class="form-label">Body</label>
        <textarea class="form-control"  name="body"></textarea>
    </div>
    <div class="mb-3">
        <label  class="form-label">Category ID</label>
        <input type="number" class="form-control"  name="category_id"/>
    </div>
    <div class="mb-3">
        <label  class="form-label">Image</label>
        <input type="file" class="form-control"  name="image"/>
    </div>
    <div class="mb-3">
        <label  class="form-label">Slug</label>
        <input type="text" class="form-control"  name="slug"/>
    </div>
    <button type="submit" class="btn btn-primary">Qo'shish</button>
</form>
@endsection