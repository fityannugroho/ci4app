<?php

namespace App\Controllers;

use \App\Models\BookModel;
use DateTimeZone;

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

        // checking the existence of the book
        if (empty($data['book'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('The book is not found');
        }

        return view('books/details', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Book'
        ];

        return view('books/add', $data);
    }

    public function insert()
    {
        // $data = $this->request->getVar();
        // dd($data);
        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->bookModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'writer' => $this->request->getVar('writer'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('message', 'Book successfully added');

        return redirect()->to('/books');
    }
}
