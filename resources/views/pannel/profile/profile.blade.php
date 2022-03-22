@extends('adminlte::page')

@section('content')
<section class="profile-page">
    <div class="container">
        <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row inputs-profile">
                <div class="col profile-data">
                    <input type="text" name="name" value="{{auth()->user()->name ? auth()->user()->name : ''}}" placeholder="Nome">
                    {{ $errors->first('name') ? $errors->first('name') : '' }}
                    <input type="email" name="email" value="{{auth()->user()->email ? auth()->user()->email : ''}}" placeholder="Email" disabled>
                    {{ $errors->first('email') ? $errors->first('email') : '' }}
                    <input type="text" name="phone" id="telefone" value="{{auth()->user()->phone ? auth()->user()->phone : ''}}" placeholder="Telefone">
                    {{ $errors->first('phone') ? $errors->first('phone') : '' }}
                </div>
                <div class="col profile-buttons">
                    <a href="{{route('confirm')}}" class="btn">Mudar e-mail e/ou senha</a>
                </div>
            </div>
            <input type="submit" class="btn" value="Salvar">
        </form>
    </div>
</section>
@endsection