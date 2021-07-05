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
            'title' => 'Add Book',
            'validation' => \Config\Services::validation()
        ];

        return view('books/add', $data);
    }

    public function insert()
    {
        // validation rules
        $rules = [
            'title' => [
                'rules' => 'required|max_length[255]|is_unique[book.title]',
                'errors' => [
                    'required' => 'The {field} field is required.',
                    'is_unique' => 'This value is already exists. Please use another name.',
                    'max_length' => 'The value for {field} must be less than {param} characters.'
                ]
            ],
            'writer' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'max_length' => 'The value for {field} must be less than {param} characters.'
                ]
            ],
            'publisher' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'max_length' => 'The value for {field} must be less than {param} characters.'
                ]
            ],
            'cover' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'max_length' => 'The value for {field} must be less than {param} characters.'
                ]
            ]
        ];

        // form validation
        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();

            // return to the form page with the form data and validation results
            return redirect()->to('/books/add')->withInput()->with('validation', $validation);
        }

        // make the slug of the book title
        $slug = url_title($this->request->getVar('title'), '-', true);

        // insert data
        $this->bookModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'writer' => $this->request->getVar('writer'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover')
        ]);

        // set success alert with session
        session()->setFlashdata('message', 'Book successfully added');

        return redirect()->to('/books');
    }
}
