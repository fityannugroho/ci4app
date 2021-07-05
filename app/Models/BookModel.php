<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'slug', 'writer', 'publisher', 'cover'];
    protected $defaultRules = [
        'title' => [
            'rules' => 'required|max_length[255]|is_unique[book.title]',
            'errors' => [
                'required' => 'The {field} field is required.',
                'is_unique' => '\'{value}\' is already exists. Please use another title.',
                'max_length' => 'The value for {field} must be less than {param} characters.'
            ]
        ],
        'writer' => [
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => 'The {field} field is required.',
                'max_length' => 'The value for {field} must be less than {param} characters.'
            ]
        ],
        'publisher' => [
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => 'The {field} field is required.',
                'max_length' => 'The value for {field} must be less than {param} characters.'
            ]
        ],
        'cover' => [
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => 'The {field} field is required.',
                'max_length' => 'The value for {field} must be less than {param} characters.'
            ]
        ]
    ];


    public function getBook($key = '', $by = 'id')
    {
        if (empty($key)) {
            return $this->findAll();
        } elseif ($by !== $this->primaryKey) {
            return $this->where([$by => $key])->first();
        } else {
            return $this->find($key);
        }
    }


    public function getDefaultRules()
    {
        return $this->defaultRules;
    }
}
