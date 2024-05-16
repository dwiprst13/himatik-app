<?php

namespace App\Controllers;

class ProtectedControllerAdmin extends BaseController
{
    public function __construct()
    {
        $session = session();

        if (!$session->has('logged_in')) {
            header('Location: /himatikadmin/login');
            exit; 
        }
    }
}
