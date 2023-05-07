<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function dashboard()
    {
        $data ['title'] = 'C4M - Dashboard';
        return view('dashboard', $data);
    }
}
