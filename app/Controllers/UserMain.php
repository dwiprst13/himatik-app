<?php

namespace App\Controllers;

class UserMain extends BaseController
{
    public function index(): string
    {
        return view('templates/user_page');
    }
}
