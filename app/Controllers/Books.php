<?php

namespace App\Controllers;

use \App\Models\BookModel;

class Books extends BaseController
{
    protected $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function index()
    {
        $books = $this->bookModel->findAll();

        $data = [
            'title' => 'Daftar Buku',
            'books' => $books
        ];

        return view('books/index', $data);
    }
}
