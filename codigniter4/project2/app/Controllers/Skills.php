<?php

namespace App\Controllers;

class Skills extends BaseController
{
    public function index(): string
    {
        return view('v_skills');
    }
}
