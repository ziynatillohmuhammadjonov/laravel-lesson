@extends('layouts.sites')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="text-center mb-3">O'qituvchilar ro'yxati</h1>
    <a href="{{route('teachers.create')}}" class="btn btn-primary">Create</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">T/R</th>
            <th scope="col">Ismi</th>
            <th scope="col">Fani</th>
            <th scope="col">Buttons</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teachers as $teacher)
            <tr>
                <th scope="row">{{$teacher->id}}</th>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->scinces}}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{route('teachers.show', $teacher->id)}}" class="btn btn-info text-white">View</a>
                    <a href="{{route('teachers.edit', $teacher->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('teachers.destroy', $teacher->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection