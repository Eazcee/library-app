<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    
    protected $table = 'books';
    //contains the fields that I allow to be saved to the database
    protected $allowedFields = ['title', 'slug','author', 'genre', 'publication_year' ];

      /**
     * @param false|string $slug
     *
     * @return array|null
     */
    public function getBooks($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}

