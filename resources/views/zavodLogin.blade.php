@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <h3>Přihláška na závod {{$zavod->za_nazev}}</h3>
            <form method="POST" action="{{ route("zavodLoginPost") }}">
                @csrf

                <input type="hidden" id="za_id" name="za_id" value="{{$zavod->za_id}}">

                <div class="form-group mb-3">
                <label>Kategorie:</label><br>
                @foreach($zavod->zavody_kategorie as $kat)
                    <input class="form-check-input" type="radio" name="kategorie" id="{{$kat->kategorie}}" value="{{$kat->kategorie}}" required> {{-- správně vkládat do databáze jen id kategorie ne název --}}
                        <label for="{{$kat->kategorie}}">{{$kat->kategorie}}</label><br>
                @endforeach
                </div>

                <div class="form-group mb-3">
                <label>Doprava:</label><br>
                @if($zavod->za_doprava === 1)
                    <input class="form-check-input" type="radio" name="doprava" id="dop_1" value="1" required>
                        <label for="dop_1">Ano</label><br>
                    <input class="form-check-input" type="radio" name="doprava" id="dop_0" value="0" required checked>
                        <label for="dop_0">Ne</label>
                @else
                    <p>Klub nezajišťuje</p>
                    <input type="hidden" name="doprava" id="dop_0" value="0">
                @endif
                </div>

                <div class="form-group mb-3">
                <label>Ubytování:</label><br>
                @if($zavod->za_ubytovani === 1)
                    <input class="form-check-input" type="radio" name="ubytovani" id="ubyt_1" value="1" required>
                        <label for="ubyt_1">Ano</label><br>
                    <input class="form-check-input" type="radio" name="ubytovani" id="ubyt_0" value="0" required checked>
                        <label for="ubyt_0">Ne</label>
                @elseif($zavod->za_ubytovani === 2)
                    <input class="form-check-input" type="radio" name="ubytovani" id="ubyt_2" value="2" required>
                        <label for="ubyt_2">Obě noci</label><br>
                    <input class="form-check-input" type="radio" name="ubytovani" id="ubyt_1" value="1" required>
                        <label for="ubyt_1">Jedna noc</label><br>
                    <input class="form-check-input" type="radio" name="ubytovani" id="ubyt_0" value="0" required checked>
                        <label for="ubyt_0">Nemám zájem</label>
                @else
                    <p>Klub nezajišťuje</p>
                    <input type="hidden" name="ubytovani" id="ubyt_0" value="0">
                @endif
                </div>

                <div class="form-group mb-3">
                    <label for="poznamka">Poznámka</label>
                    <input class="form-control" type="text" placeholder="poznámka" id="poznamka" name="poznamka">
                </div>


                <div class="">
                    <button type="submit" class="btn btn-primary">Přihlásit se na závod</button>
                </div>
            </form>
        </div>
    </main>
@endsection
