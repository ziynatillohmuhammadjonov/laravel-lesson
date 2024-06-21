@extends('layouts.sites')

@section('content')
    <h1>Components page with work komponents</h1>
    <x-button type='danger' text='Delete' />
    <x-button type='success' text='Done' />
    {{-- @dd($regions) --}}
    <x-select class="form-control" :regions="$regions" />
    <x-alert>
        <x-slot name='title'>
            Title
        </x-slot>
        <x-slot name='description'>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cum, iste quis reprehenderit suscipit porro
            sit tenetur id eum. Dolorem.
        </x-slot>
    </x-alert>
@endsection
