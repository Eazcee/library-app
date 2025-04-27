<?php

namespace App\Controllers;

use App\Models\BooksModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Books extends BaseController
{

    public function index()
    {
        $model = model(BooksModel::class);

        $data = [
            'book_list' => $model->getBooks(),
            'title'     => 'List of Books',
        ];

        return view('templates/header', $data)
            . view('books/index')
            . view('templates/footer');
    }

    public function show(?string $slug = null)
    {
        $model = model(BooksModel::class);

        $data['book'] = $model->getBooks($slug);

        if ($data['book'] === null) {
            throw new PageNotFoundException('Cannot find the book item: ' . $slug);
        }

        $data['title'] = $data['book']['title'];

        return view('templates/header', $data)
            . view('books/view')
            . view('templates/footer');
    }

    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a book item'])
            . view('books/create')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['title', 'author', 'genre', 'publication_year', ]);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'author'  => 'required|max_length[255]|min_length[2]',
            'genre'  => 'required|max_length[255]|min_length[2]',
            'publication_year'  => 'required|integer|exact_length[4]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(BooksModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'author'  => $post['author'],
            'genre' => $post['genre'],
            'publication_year' => $post['publication_year'],

        ]);

        //redirects to library page with sucess message
        return redirect()
        ->to('/library')
        ->with('success', 'Book created successfully!');
    }

    public function edit($id){
        helper('form');

        //import model data
        $model = model(BooksModel::class);

        //find book you want to edit data
        $book = $model->find($id);

        if(!$book){
            throw new PageNotFoundException('Book not found: ' . $id);
        }

        return view('books/edit', [
            'book'=>$book,
        ]);

    }

    public function update($id){
    helper('form');

    $model = model(BooksModel::class);

    $data = $this->request->getPost(['title', 'author', 'genre', 'publication_year', ]);

    if(!$this->validateData($data,[
        'title' => 'required|max_length[255]|min_length[3]',
            'author'  => 'required|max_length[255]|min_length[2]',
            'genre'  => 'required|max_length[255]|min_length[2]',
            'publication_year'  => 'required|integer|exact_length[4]',
    ])){
        return redirect()->back()->withInput();
    }
        
    $post = $this->validator->getValidated();

    $model->update($id, [
        'title' => $post['title'],
        'slug' => url_title($post['title'], '-', true),
        'author'=> $post['author'],
        'genre'=> $post['genre'],
        'publication_year'=> $post['publication_year'],
    ]);


    //redirects to library page with sucess message
    return redirect()
    ->to('/library')
    ->with('success', 'Book updated successfully!');

    }


    public function delete($id){
        helper('form');

        $model = model(BooksModel::class);

        $book = $model->find($id);

        if(!$book){
            throw new PageNotFoundException('Book not found: ' . $id);
        }

        return view('books/delete',[
            'book'=>$book,
        ]);
    }

    public function confirm($id){

        helper('form');

        //import model data
        $model = model(BooksModel::class);

        //find book you want to edit data
        $book = $model->find($id);

        if(!$book){
            throw new PageNotFoundException('Book not found: ' . $id);
        }

        $model->delete($id);

        //redirects to library page with sucess message
    return redirect()
    ->to('/library')
    ->with('success', 'Book deleted successfully!');
    }

}