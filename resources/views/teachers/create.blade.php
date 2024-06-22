@extends('layouts.sites')

@section('content')
<h1 class="text-center">Teachers create</h1>
<form action="{{route('teachers.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Ismini kiriting</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="scinces" class="form-label">Fanini kiriting</label>
        <input type="text" class="form-control" id="scinces" name="scinces">
    </div>
    <button type="submit" class="btn btn-primary">Qo'shish</button>
</form>
@endsection