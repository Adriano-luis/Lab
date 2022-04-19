<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Blog;
use App\User;

class HomeController extends Controller
{
    public function index(){
        $articles = Blog::all();
        $services = Service::all();
        return view('index',['articles' => $articles, 'services' => $services]);
    }

    public function contact(){
        return view('contact');
    }

    public function blog(){
        $articles = Blog::orderBy('id', 'DESC')->paginate(12);
        return view('blog',['articles' => $articles]);
    }

    public function article($urn)
    {
        $blog = Blog::where('urn',$urn)->first();
        return view('article',['article' => $blog]);
    }
}
