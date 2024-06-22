@extends('layouts.sites')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="text-center mb-3">O'qituvchilar ma'lumotni</h1>
    <a href="{{route('teachers.index')}}" class="btn btn-primary">Back</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ismi</th>
            <th scope="col">Fani</th>
            <th>Qo'shilgan vaqti</th>
        </tr>
    </thead>
    <tbody>

            <tr>
                <th scope="row">{{$teacher->id}}</th>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->scinces}}</td>
                <td>{{$teacher->created_at}}</td>
               
            </tr>

    </tbody>
</table>
@endsection