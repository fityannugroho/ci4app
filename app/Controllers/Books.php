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
        $books = $this->bookModel->getBook();

        $data = [
            'title' => 'My Books',
            'books' => $books
        ];

        return view('books/index', $data);
    }

    public function details($slug)
    {
        $book = $this->bookModel->getBook($slug);

        $data = [
            'title' => $book['title'],
            'book' => $book
        ];

        return view('books/details', $data);
    }
}
