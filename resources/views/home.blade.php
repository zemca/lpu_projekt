@extends('dashboard')

@section('content')
    <div class="container">
        <div class="center">
            <p align="center">Přihlášen uživatel: {{ $uzivatel->uz_jmeno }} {{ $uzivatel->uz_prijmeni }}, {{ $uzivatel->uz_reg_cislo }}</p>
        </div>
        <h3>Aktuality</h3>
        <ul>
        @foreach($aktuality as $aktualita)
                <li>{{ $aktualita->ak_text }}</li>
        @endforeach
        </ul>
        @if($prihlasky->count() === 0)
            <h4 align="center">Nejste přihlášeni na žádné závody.</h4>
        @else
            <h3 align="center">Jste přihlášeni na tyto závody:</h3>
            <table border="1" width="95%" cellpadding="" align="center">
                <thead>
                    <tr>
                        <th>Název závodu</th>
                        <th>Datum závodu</th>
                        <th>Konec přihlášek</th>
                        <th>Místo</th>
                        <th>Kategorie</th>
                        <th>Doprava</th>
                        <th>Ubytování</th>
                        <th>Odjezd autobusu</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prihlasky as $prihlaska)
                    <tr>
                        <td>{{$prihlaska->zavody->za_nazev}}</td>
                        <td>{{str_replace('-', '.', (date('d-m-Y', strtotime($prihlaska->zavody->za_termin))))}}</td>
                        <td>
                            @if($prihlaska->zavody->za_status == 0)
                                {{str_replace('-', '.', (date('d-m-Y', strtotime($prihlaska->zavody->za_konec_prihl))))}}
                            @else
                                <samp class="text-danger">{{str_replace('-', '.', (date('d-m-Y', strtotime($prihlaska->zavody->za_konec_prihl))))}}</samp>
                            @endif
                        </td>
                        <td>
                            @if($prihlaska->zavody->za_misto == "")
                                ---
                            @else
                                {{$prihlaska->zavody->za_misto}}
                            @endif
                        </td>
                        <td>{{$prihlaska->pr_kategorie}}</td>
                        <td>
                            @if($prihlaska->pr_doprava == 0)
                                NE
                            @else
                                ANO
                            @endif
                        </td>
                        <td>
                            @if($prihlaska->pr_ubytovani == 1 and $prihlaska->zavody->za_ubytovani == 1)
                                ano
                            @elseif($prihlaska->pr_ubytovani == 1 and $prihlaska->zavody->za_ubytovani == 2)
                                jen so/ne
                            @elseif($prihlaska->pr_ubytovani == 2 and $prihlaska->zavody->za_ubytovani == 2)
                                obě noci
                            @else
                                ne
                            @endif
                        </td>
                        <td>
                            @if($prihlaska->zavody->za_doprava == 0 or $prihlaska->zavody->za_odjcas == null or $prihlaska->zavody->za_odjcas == ":")
                                ---
                            @else
                                @switch($prihlaska->zavody->za_odjmisto)
                                    @case(1)
                                        v {{$prihlaska->zavody->za_odjcas}} ze Zborovského nám. (staví se v Polabinách)
                                        @break
                                    @case(2)
                                        v {{$prihlaska->zavody->za_odjcas}} ze Zborovského nám. (staví se na Dubině)
                                        @break
                                    @case(3)
                                        v {{$prihlaska->zavody->za_odjcas}} ze Zborovského nám.
                                        @break
                                    @case(4)
                                        v {{$prihlaska->zavody->za_odjcas}} od Zimního stadiónu
                                        @break
                                    @case(5)
                                        v {{$prihlaska->zavody->za_odjcas}} z Polabin
                                        @break
                                    @default
                                @endswitch
                            @endif

                        </td>
                        <td><a href="{{url("zavod/" . $prihlaska->zavody->za_id)}}">Detail</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <p>
                Ke změně přihlášky a k dalším informacím o závodu se dostanete přes <strong>Detail</strong> vybraného závodu. Pokud je datum <strong>Konec přihlášek</strong> označeno <span class="text-danger">červeně</span>, nelze již přihlášku na tento závod měnit.
            </p>
        @endif

        @if($prihlaskyvic->count() === 0)
            <h4 align="center">Nejste přihlášeni na žádné vícedenní závody.</h4>
        @else
            <h3 align="center">Jste přihlášeni na tyto vícedenní závody:</h3>
            <table border="1" width="95%" cellpadding="" align="center">
                <thead>
                    <TR>
                        <th align="center">Název závodu</th>
                        <th align="center">Datum závodu</th>
                        <th align="center">Konec přihlášek</th>
                        <th align="center">Místo</th>
                        <th align="center">Kategorie</th>
                        <th align="center">Ubytování</th>
                        <th align="center">Vzkaz</th>
                        <th align="center">Stav</th>
                        <th align="center">Detail</th>
                    </TR>
                </thead>
                <tbody>
                    @foreach($prihlaskyvic as $prihlaska)
                        <tr>
                            <td>{{$prihlaska->zavvic->za_nazev}}</td>
                            <td>{{$prihlaska->zavvic->za_termintext}}</td>
                            <td>
                                @if($prihlaska->zavvic->za_status == 0)
                                    {{str_replace('-', '.', (date('d-m-Y', strtotime($prihlaska->zavvic->termin_zavvic->where('ter_tag', $prihlaska->zavvic->za_terminprihl)->first()->ter_datum))))}}
                                @endif
                            </td>
                            <td>
                                @if($prihlaska->zavvic->za_misto == "")
                                    ---
                                @else
                                    {{$prihlaska->zavvic->za_misto}}
                                @endif
                            </td>
                            <td>{{$prihlaska->pr_kategorie}}</td>
                            <td>
                                @if($prihlaska->zavvic->za_ubyt != "" and $prihlaska->pr_ubytovani != -1)
                                    {{$prihlaska->poleUbytovani[$prihlaska->pr_ubytovani]}}
                                @else
                                    ---
                                @endif
                            </td>
                            <td>
                                @if($prihlaska->pr_vzkaz != "" and $prihlaska->pr_vzkaz != "0")
                                    <span title="{{$prihlaska->pr_vzkaz}}">*</span>
                                @else
                                    ---
                                @endif
                            </td>
                            <td>
                                @if($prihlaska->pr_potvrzeni == 0)
                                    <span class="text-danger">Zaplatit</span>
                                @elseif($prihlaska->pr_potvrzeni == 1)
                                    Přihlášen
                                @endif
                            </td>
                            <td><a href="{{url("vicedenniZavod/" . $prihlaska->zavvic->za_id)}}">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>
                Ke změně přihlášky a k dalším informacím o závodu se dostanete přes <strong>Detail</strong> vybraného závodu. Pokud je datum <strong>Konec přihlášek</strong> označeno <span class="text-danger">červeně</span>, nelze již přihlášku na tento závod měnit. Pokud máte sloupci Vzkaz symbol *, vedoucí vám píše vzkaz, který zobrazíte v Detailu nebo najetím myší na hvězdičku.
            </p>
        @endif

        @if($akce->count() === 0)
            <h4 align="center">Nejste přihlášeni na žádnou další akci.</h4>
        @else
            <h3 align="center">Jste přihlášeni na tyto ostatní akce:</h3>

            <table border="1" width="95%" cellpadding="" align="center">
                <thead>
                    <tr>
                        <th>Název akce</th>
                        <th>Termín akce</th>
                        <th>Konec přihlášek</th>
                        <th>Místo</th>
                        <th>Kategorie</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($akce as $ak)
                        <tr>
                            <td>{{$ak->akce->ak_nazev}}</td>
                            <td>{{str_replace('-', '.', (date('d-m-Y', strtotime($ak->akce->ak_zacatek_datum))))}}</td>
                            @if($ak->akce->ak_typ_prihlasek == 1 or $ak->akce->akce_prihlasky_def->first()->apd_konec_prihlasek == null)
                                <td>---</td>
                            @else
                                @if($ak->akce->ak_status == 0)
                                    <td>{{str_replace('-', '.', (date('d-m-Y', strtotime($ak->akce->akce_prihlasky_def->first()->apd_konec_prihlasek))))}}</td>
                                @else
                                    <td class="text-danger">{{str_replace('-', '.', (date('d-m-Y', strtotime($ak->akce->akce_prihlasky_def->first()->apd_konec_prihlasek))))}}</td>
                                @endif
                            @endif
                            <td>{{$ak->akce->ak_misto}}</td>
                            <td>
                                @if($ak->pr_kategorie == null)
                                    ---
                                @else
                                    {{$ak->pr_kategorie}}
                                @endif
                            </td>
                            <td>Detail</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>
                Ke změně přihlášky a k dalším informacím o akci se dostanete přes <strong>Detail</strong>. Pokud je datum <strong>Konec přihlášek</strong> označeno <span class="text-danger">červeně</span>, nelze již přihlášku na tuto akci měnit.
            </p>
        @endif
    </div>
@endsection
