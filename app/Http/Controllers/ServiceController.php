<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services =  auth::user()->services()->paginate(10);
        return view('pannel.service',['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
        //return view('pannel.service-edit', ['edit' => false]);
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
            'description' => 'required',
            'phone' => 'required|min:11|max:14',
        ];
        $feedback = [
            'required' => 'Você precisa me preencher!',
            'phone.min' => 'Digite o telefone apenas com números',
            'phone.max' => 'Digite o telefone apenas com números'
        ];

        $request->validate($rules,$feedback);
        

        $image = $request->file('image');
        $image_urn = $image->store('images/services','public');
        Service::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_urn,
            'image_title' => $request->image_title,
            'image_alt' => $request->image_alt,
            'phone' => $request->phone
        ]);

        $service = Service::orderBy('created_at', 'desc')->get()->first();
        return redirect()->route('services.index');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('pannel.service-edit',['service' => $service,'edit' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        if($request->input('usePhone') == 'on'){

            $rules = [
                'title' => 'required',
                'description' => 'required',
            ];
        }else{

            $rules = [
                'title' => 'required',
                'description' => 'required',
                'phone' => 'required|min:11|max:14',
            ];
        }
        $feedback = [
            'required' => 'Você esqueceu de me preencher!',
            'phone.min' => 'Digite o telefone apenas com números',
            'phone.max' => 'Digite o telefone apenas com números'
        ];

        if (!$service){
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
        $request->input('usePhone') == 'on' ? $phone = auth::user()->phone : $phone = $request->phone;
        $request->input('active') == 'on' ? $active = '1' : $active = '0';

        if($request->file('image')){

            Storage::disk('public')->delete($service->image);
            $image = $request->file('image');
            $image_urn = $image->store('images/services', 'public');
    
            Service::where('id',$service->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image_urn,
                'image_alt' => $request->image_alt,
                'image_title' => $request->image_title,
                'phone' => $phone,
                'active' => $active
            ]);
        }

        Service::where('id',$service->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_alt' => $request->image_alt,
            'image_title' => $request->image_title,
            'phone' => $phone,
            'active' => $active
        ]);

        return redirect()->route('services.index',['service'=>$service->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        return redirect()->back();
    }
}
