@extends('layouts.sites')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="text-center">Teachers edit</h1>
    <a href="{{route('teachers.index')}}" class="btn btn-primary">Back</a>
</div>
<form action="{{route('teachers.update', $teacher->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Ismini kiriting</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$teacher->name}}">
    </div>
    <div class="mb-3">
        <label for="scinces" class="form-label">Fanini kiriting</label>
        <input type="text" class="form-control" id="scinces" name="scinces" value="{{$teacher->scinces}}">
    </div>
    <button type="submit" class="btn btn-primary">Qo'shish</button>
</form>
@endsection