@extends('adminlte::page')
@section('content')
<main id="profile-admin">
    <h1>Configuration Admin</h1>
    <div class="container">
        <form action="{{route('profile.save')}}" method="POST">
            @csrf
            <div class="row inputs-profile">
                <div class="col profile-data">
                    <input type="email" name="email" value="{{auth()->user()->email ? auth()->user()->email : ''}}" placeholder="Email">
                    {{ $errors->first('email') ? $errors->first('email') : '' }}
                    <input type="password" name="password" id="password" placeholder="Nova senha">
                    {{ $errors->first('password') ? $errors->first('password') : '' }}
                </div>
            </div>
            <input type="submit" class="btn save" value="Salvar">
        </form>
    </div>
</main>
@endsection