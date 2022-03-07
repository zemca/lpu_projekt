@extends('dashboard')

@section('content')
    <div class="container">
        <h3 class="dl-horizontal">Detail závodu</h3>
        <dl>
            <dt>Název závodu</dt>
            <dd>{{$zavod->za_nazev}}</dd>
            <dt>Datum</dt>
            <dd>{{str_replace('-', '.', (date('d-m-Y', strtotime($zavod->za_termin))))}}</dd>
            <dt>Konec přihlášek</dt>
            <dd>
                @if($zavod->za_status == 0)
                    {{str_replace('-', '.', (date('d-m-Y', strtotime($zavod->za_konec_prihl))))}}
                @else
                    <span class="text-danger">{{str_replace('-', '.', (date('d-m-Y', strtotime($zavod->za_konec_prihl))))}}</span>
                @endif
            </dd>
            <dt>Místo</dt>
            <dd>
                @if($zavod->za_misto == null)
                    ---
                @else
                    {{$zavod->za_misto}}
                @endif
            </dd>
            <dt>Pořádá klub</dt>
            <dd>{{$zavod->za_oddil}}</dd>
            <dt>Stránky závodu</dt>
            <dd>
                @if($zavod->za_web == null)
                    ---
                @else
                    <a href="http://{{$zavod->za_web}}" target="_blank">{{$zavod->za_web}}</a>
                @endif
            </dd>
            @if($zavod->za_doprava == 1)
                <dt>Klubová doprava (Kč)</dt>
                <dd>{{$zavod->za_cena_dopravy}}</dd>
                <dt>Odjezd autobusu</dt>
                <dd>
                    @if($zavod->za_doprava == 0 or $zavod->za_odjcas == null or $zavod->za_odjcas == ":")
                        ---
                    @else
                        v {{$zavod->za_odjcas}}
                        @switch($zavod->za_odjmisto)
                            @case(1)
                             ze Zborovského nám. (staví se v Polabinách)
                            @break
                            @case(2)
                             ze Zborovského nám. (staví se na Dubině)
                            @break
                            @case(3)
                             ze Zborovského nám.
                            @break
                            @case(4)
                             od Zimního stadiónu
                            @break
                            @case(5)
                             z Polabin
                            @break
                            @default
                             místo není specifikováno
                        @endswitch
                    @endif
                </dd>
            @else
                <dt>Doprava</dt>
                <dd>Na tento závod klub dopravu nezajišťuje.</dd>
            @endif
            <dt>Poznámky</dt>
            <dd>
                @if($zavod->za_poznamka == null)
                    ---
                @else
                    {{$zavod->za_poznamka}}
                @endif
            </dd>
            <dt>Klubová přihláška</dt>
            <dd>!!!!!!!!!!!!!!!!!!!!!!!!!</dd>
            <dt>Kategorie / Klubový vklad (Kč)</dt>
            @foreach($zavod->zavody_kategorie as $kat)
                <dd>{{$kat->kategorie}} / {{$kat->vklad}}</dd>
            @endforeach
            @if($zavod->za_ubytovani == 1 or $zavod->za_ubytovani == 2)
                <dt>Klubové ubytování (Kč)</dt>
                <dd>{{$zavod->za_cena_ubytovani}}</dd>
            @else
                <dt>Ubytování</dt>
                <dd>Na tento závod klub ubytování nezajišťuje.</dd>
            @endif
        </dl>
        @if($zavod->za_status == 0)
            @if($zavod->prihlasky->where('uz_id', $uzivatel->getAuthIdentifier())->first() == null)
                <h5>Na tento závod nejste přihlášeni. <a class="btn btn-primary btn-block" href="{{url("/zavodLogin/" . $zavod->za_id)}}">Přihlásit se!</a></h5>
            @else
                <form method="POST" action="{{ route("zavodLogoutPost") }}">
                    @csrf
                    <input type="hidden" name="za_id" id="za_id" value="{{$zavod->za_id}}">
                    <h5>Na tento závod jste již přihlášeni. <button type="submit" class="btn btn-danger btn-block">Odhlásit se!</button></h5>
                </form>
            @endif
        @else
            <h5>Termín přihlášek <span class="text-danger">skončil</span>, v IS nelze provádět změny!</h5>
        @endif
    </div>
@endsection
