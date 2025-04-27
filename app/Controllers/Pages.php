<?php
namespace App\Controllers;

// this line is to import class
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');

    }

    public function view(string $page = 'home')
    {
        if(! is_file(APPPATH. 'Views/pages/' . $page . '.php')){
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); //capitlize first letter

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer'); 

    }



}