<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $articles =  auth::user()->blogs()->paginate(10);
        return view('pannel.blog',['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
        //return view('pannel.blog-edit', ['edit' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back();
        /*$rules = [
            'title' => 'required',
            'image' => 'required|file|mimes:png,jpg,jpeg',
            'text' => 'required',
            'author' => 'required',
        ];
        $feedback = [
            'required' => 'Você precisa me preencher!' 
        ];

        $request->validate($rules,$feedback);

        $image = $request->file('image');
        $image_urn = $image->store('images/articles','public');
        Blog::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_urn,
            'image_title' => $request->image_title,
            'image_alt' => $request->image_alt,
            'text' => $request->text,
            'author' => $request->author
        ]);

        $article = Blog::orderBy('created_at', 'desc')->get()->first();
        return redirect()->route('blogs.show',['blog' => $article->id]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('pannel.blog-show',['article' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        
        return view('pannel.blog-edit',['article' => $blog,'edit' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $rules = [
            'title' => 'required',
            'image' => 'file|mimes:png,jpg,jpeg',
            'text' => 'required',
            'author' => 'required'
        ];
        $feedback = [
            'required' => 'Você esqueceu de me preencher!'
        ];

        if (!$blog){
            return "Conteúdo não encontrado!";
        }

        if($request->method() === 'PATCH'){
            $dinamycsRules = array();

            foreach($rules as $input => $rule){
                if(array_key_exists($input, $request->all())){
                    $dinamycsRules[$input] = $rule;
                }
            }
            $request->validate($dinamycsRules,$feedback);
        }
        $request->validate($rules,$feedback);
        $request->input('useAuthor') == 'on' ? $author = auth::user()->name : $author = $request->author;
        $request->input('active') == 'on' ? $active = '1' : $active = '0';

        if($request->file('image')){

            Storage::disk('public')->delete($blog->image);
            $image = $request->file('image');
            $image_urn = $image->store('images/articles', 'public');
    
            Blog::where('id',$blog->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image_urn,
                'image_alt' => $request->image_alt,
                'image_title' => $request->image_title,
                'text' => $request->text,
                'author' => $author,
                'active' => $active
            ]);
        }

        Blog::where('id',$blog->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_alt' => $request->image_alt,
            'image_title' => $request->image_title,
            'text' => $request->text,
            'author' => $author,
            'active' => $active
        ]);

        return redirect()->route('blogs.show',['blog'=>$blog->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //Blog::where('id', $blog->id)->delete();
        //return redirect()->route('blogs.index');
        return redirect()->back();
    }
}
