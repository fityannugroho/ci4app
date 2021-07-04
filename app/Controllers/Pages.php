<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contacts',
            'addresses' => [
                [
                    'type' => 'Home',
                    'street' => 'Jl. Cibiru No. 123',
                    'city' => 'Bandung'
                ],
                [
                    'type' => 'Office',
                    'street' => 'Jl. Setiabudi No. 123',
                    'city' => 'Bandung'
                ],
            ]
        ];

        return view('pages/contact', $data);
    }
}
