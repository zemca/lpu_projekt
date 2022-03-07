@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Přihláška na závod {{$zavod->za_nazev}}</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route("zavodLoginPost") }}">
                                @csrf

                                <input type="hidden" id="za_id" name="za_id" value="{{$zavod->za_id}}">

                                <p>Kategorie:</p>
                                @foreach($zavod->zavody_kategorie as $kat)
                                    <input type="radio" name="kategorie" id="{{$kat->kategorie}}" value="{{$kat->kategorie}}" required> {{-- správně vkládat do databáze jen id kategorie ne název --}}
                                        <label for="{{$kat->kategorie}}">{{$kat->kategorie}}</label><br>
                                @endforeach

                                <p>Doprava:</p>
                                @if($zavod->za_doprava === 1)
                                    <input type="radio" name="doprava" id="dop_1" value="1" required>
                                        <label for="dop_1">Ano</label><br>
                                    <input type="radio" name="doprava" id="dop_0" value="0" required checked>
                                        <label for="dop_0">Ne</label>
                                @else
                                    <p>Klub nezajišťuje</p>
                                    <input type="hidden" name="doprava" id="dop_0" value="0">
                                @endif

                                <p>Ubytování:</p>
                                @if($zavod->za_ubytovani === 1)
                                    <input type="radio" name="ubytovani" id="ubyt_1" value="1" required>
                                        <label for="ubyt_1">Ano</label><br>
                                    <input type="radio" name="ubytovani" id="ubyt_0" value="0" required checked>
                                        <label for="ubyt_0">Ne</label>
                                @elseif($zavod->za_ubytovani === 2)
                                    <input type="radio" name="ubytovani" id="ubyt_2" value="2" required>
                                        <label for="ubyt_2">Obě noci</label><br>
                                    <input type="radio" name="ubytovani" id="ubyt_1" value="1" required>
                                        <label for="ubyt_1">Jedna noc</label><br>
                                    <input type="radio" name="ubytovani" id="ubyt_0" value="0" required checked>
                                        <label for="ubyt_0">Nemám zájem</label>
                                @else
                                    <p>Klub nezajišťuje</p>
                                    <input type="hidden" name="ubytovani" id="ubyt_0" value="0">
                                @endif

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="poznámka" id="poznamka" name="poznamka">
                                </div>


                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Přihlásit se na závod</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
