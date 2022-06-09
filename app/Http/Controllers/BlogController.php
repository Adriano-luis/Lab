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
        return view('pannel.blog-edit', ['edit' => false,'exist'=>false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'image' => 'required|file|mimes:png,jpg,jpeg',
            'text' => 'required'
        ];
        $feedback = [
            'required' => 'Você precisa me preencher!'
        ];

        $request->validate($rules,$feedback);
        $request->input('useAuthor') == 'on' ? $author = auth::user()->name : $author = $request->author;
        $request->input('active') == 'on' ? $active = '1' : $active = '0';
        $image = $request->file('image');
        $image_urn = $image->store('images/articles','public');

        $urn = $request->title;
        $urn = explode(" ",$urn);
        $urn = implode("-",$urn);
        $urn = strtolower($urn);
        function tirarAcentos($string){
            return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
        }
        $urn = str_replace('?', "", $urn);
        $urn = tirarAcentos($urn);
        $exist = Blog::where('urn',$urn)->first();
        if($exist){
            return view('pannel.blog-edit', ['edit' => false,'exist'=>true]);
        }

        Blog::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_urn,
            'image_title' => $request->image_title,
            'image_alt' => $request->image_alt,
            'text' => $request->text,
            'author' => $author,
            'active' => $active,
            'urn' => $urn,
        ]);

        $article = Blog::orderBy('created_at', 'desc')->get()->first();
        return redirect()->route('blogs.show',['blog' => $article->urn]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $data
     * @return \Illuminate\Http\Response
     */
    public function show($urn)
    {
        $blog = Blog::where('urn',$urn)->first();
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
        
        return view('pannel.blog-edit',['article' => $blog,'edit' => true, 'exist'=>false]);
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
            'author' => 'required',
            'urn' => 'unique:blogs,urn,'.$blog->id
        ];
        $feedback = [
            'required' => 'Você esqueceu de me preencher!',
            'urn.unique' => 'Essa urn já existe!'
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
        $urn = $request->urn;
        $urn = explode(" ",$urn);
        $urn = implode("-",$urn);
        $urn = strtolower($urn);
        function tirarAcentos($string){
            return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
        }
        $urn = str_replace('?', "", $urn);

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
                'active' => $active,
                'urn' => $urn
            ]);
        }

        Blog::where('id',$blog->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_alt' => $request->image_alt,
            'image_title' => $request->image_title,
            'text' => $request->text,
            'author' => $author,
            'active' => $active,
            'urn' => $urn
        ]);
        $blog = Blog::where('id',$blog->id)->first();
        return redirect()->route('blogs.show',['blog'=>$blog->urn]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Blog::where('id', $blog->id)->delete();
        return redirect()->route('blogs.index');
    }
}
