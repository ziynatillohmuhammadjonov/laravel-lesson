<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(): string
    {
        return 'All posts view';
    }

    public function create(): string{
        return 'create post';
    }

    public function store(): string{
        return 'store post';
    }

    public function show(): string{
        return 'show post';
    }

    public function edit(): string{
        return 'edit post';
    }

    public function update(): string{
        return 'update post';
    }
}
