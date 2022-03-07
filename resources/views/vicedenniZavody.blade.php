@extends('dashboard')

@section('content')
    <div class="container">
        <h3>Vícedenní závody {{$rok}}</h3>

        <p>
            K přihlášce, změně přihlášky a k dalším informacím o závodu se dostanete přes <strong>Detail</strong> vybraného závodu. Pokud je datum <strong>Konec přihlášek</strong> označeno <span class="text-danger">červeně</span>, tak v IS už přihlášku nemůžete měnit.
        </p>
        <p>
            Vklady za vícedenní závody se strhávají z konta v IS. Zajistěte si na kontě dostatečný zůstatek. Vedoucích vícedenních závodů jsou potřeba až na samotných závodech (vyzvednout doklad na prezentaci a doručit Béďovi, rozdat ubytovací pásky atd.).
        </p>
        <table border="1" width="97%" cellpadding="3" cellspacing="0" align="center">
            <thead>
                <tr>
                    <th>Název</th>
                    <th>Datum</th>
                    <th>Konec přihlášek</th>
                    <th>Místo</th>
                    <th>Klub</th>
                    <th>Poznámky</th>
                    <th>Stav</th>
                    <th>Detail</th>
                </tr>
            </thead>
            @if($zavody->count() != 0)
                <tbody>
                    @foreach($zavody as $zavod)
                        <tr>
                            <td>{{$zavod->za_nazev}}</td>
                            <td>{{$zavod->za_termintext}}</td>
                            <td>
                                @if($zavod->za_status == 0)
                                    {{str_replace('-', '.', (date('d-m-Y', strtotime($zavod->za_konec_prihl))))}}
                                @else
                                    <span class="text-danger">{{str_replace('-', '.', (date('d-m-Y', strtotime($zavod->za_konec_prihl))))}}</span>
                                @endif
                            </td>
                            <td>
                                @if($zavod->za_misto == "")
                                    ---
                                @else
                                    {{$zavod->za_misto}}
                                @endif
                            </td>
                            <td>{{$zavod->za_oddil}}</td>
                            <td>
                                @if($zavod->za_poznamka == "")
                                    ---
                                @else
                                    <samp title="{{$zavod->za_poznamka}}">*</samp>
                                @endif
                            </td>
                            <td>
                                @if($zavod->prihlaskyvic->where('uz_id', $uzivatel->getAuthIdentifier())->first() == null)
                                    Nepřihlášen
                                @elseif($zavod->prihlaskyvic->where('uz_id', $uzivatel->getAuthIdentifier())->first()->pr_potvrzeni != 1)
                                    <span class="text-danger">Zaplatit</span>
                                @else
                                    Přihlášen
                                @endif
                            </td>
                            <td><a href="{{url("vicedenniZavod/" . $zavod->za_id)}}">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <p align="center"><em>Zatím nejsou vypsány žádné závody.</em></p>
            @endif
        </table>
        <p>
            Vícedenní závody jsou do IS zadávány postupně, jak vychází rozpisy.
        </p>
    </div>
@endsection
