<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
    public function index(): string
    {
        $postModel = new PostModel();

        $posts = $postModel
            ->where('status', 'published')
            ->orderBy('created_at', 'DESC')
            ->findAll(3); // ambil 3 terbaru

        return view('home', ['posts' => $posts]);
    }
}