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
            'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
            'errors' => [
                'max_size' => 'The size of file image is too large. Max: 1MB.',
                'is_image' => 'The file you selected is not an image. Please choose image only.',
                'mime_in' => 'The file you selected is not an image. Please choose image only.'
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


    public function search($keyword)
    {
        $builder = $this->table('book');
        return $builder->like('title', $keyword)->orLike('writer', $keyword)->orLike('publisher', $keyword);
    }
}
