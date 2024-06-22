@extends('layouts.sites')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="text-center mb-3">O'qituvchilar ro'yxati</h1>
    <button class="btn btn-primary">Create</button>
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
                <td>
                    <button type="button" class="btn btn-info text-white">View</button>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection