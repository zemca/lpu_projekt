@extends('dashboard')

@section('content')
    <div class="container">
        <h3 class="dl-horizontal">Detail závodu</h3>
        <dl>
            <dt>Název závodu</dt>
            <dd>{{$zavod->za_nazev}}</dd>
            <dt>Datum</dt>
            <dd>{{str_replace('-', '.', (date('d-m-Y', strtotime($zavod->za_terminzac))))}}</dd>
            <dt>Konec přihlášek</dt>
            <dd>{{str_replace('-', '.', (date('d-m-Y', strtotime($zavod->za_konec_prihl))))}}</dd>
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
            @foreach($zavod->za_kat_cena as $kat)
                <dd>
                    {{$kat->za_kateg}} / {{$kat->vklad}}
                </dd>
            @endforeach

            @if($zavod->za_ubytovani == 1 or $zavod->za_ubytovani == 2)
                <dt>Klubové ubytování (Kč)</dt>
                <dd>{{$zavod->za_cena_ubytovani}}</dd>
            @else
                <dt>Ubytování</dt>
                <dd>Na tento závod klub ubytování nezajišťuje.</dd>
            @endif

        </dl>
        @if($zavod->prihlaskyvic->where('uz_id', $uzivatel->getAuthIdentifier())->first() == null)
            <h4>Na tento závod nejste přihlášeni. <a href="#">Přihlásit se!</a></h4>
        @else
            <h4>Na tento závod jste již přihlášeni. <a href="#">Odhlásit se!</a></h4>
        @endif
    </div>
@endsection
