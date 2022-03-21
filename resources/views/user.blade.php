@extends('dashboard')

@section('content')
    <div class="login-form">
        <div class="cotainer">
            <h3>Detail uživatele</h3>
            <div class="cart">
                @if($chyba != null)
                    <p class="text-danger">{{$chyba}}</p>
                @elseif($uspech != null)
                    <p class="text-success">{{$uspech}}</p>
                @endif
                <form method="POST" action="{{ route("userDataChange") }}">
                    @csrf
                    <dl>
                        <div class="form-group">
                            <dt>Telefon</dt>
                            <dd><input class="form-control" type="text" name="phone" value="{{$uzivatel->uz_mobil}}"></dd>
                        </div>
                        <div class="form-group">
                            <dt>E-mail</dt>
                            <dd><input class="form-control" type="email" name="email" value="{{$uzivatel->uz_email}}" required></dd>
                        </div>
                        <div class="form-group">
                            <dt>Nové heslo</dt>
                            <dd><input class="form-control" type="password" name="password1"></dd>
                        </div>
                        <div class="form-group">
                            <dt>Znovu</dt>
                            <dd><input class="form-control" type="password" name="password2"></dd>
                        </div>
                        <div class="form-group">
                            <dt>Hromadné e-maily</dt>
                            <dd><input class="form-check-input" type="checkbox" name="hrEmail" @if($uzivatel->uz_maillist !=0) checked @endif></dd>
                        </div>
                        <div class="form-group">
                            <dt>Tréninkové info</dt>
                            <dd><input class="form-check-input" type="checkbox" name="trInfo" @if($uzivatel->uz_mailtrenink !=0) checked @endif></dd>
                        </div>
                    </dl>
                    <button type="submit" class="btn btn-primary btn-block">Změnit údaje</button>
                </form>
            </div>
        </div>
    </div>
@endsection
