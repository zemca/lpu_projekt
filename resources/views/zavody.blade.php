@extends('dashboard')

@section('content')
    <div class="container">
        <h3>Závody {{$rok}}</h3>

        <p>
            K přihlášce, změně přihlášky a k dalším informacím o závodu se dostanete přes <strong>Detail</strong> vybraného závodu. Pokud je datum <strong>Konec přihlášek</strong> označeno <span class="text-danger">červeně</span>, tak v IS už přihlášku nemůžete měnit. <strong>Přihlášky na více závodů najednou</strong> najdete na této stránce dole.
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
                    <th>Přihlášen</th>
                    <th>Detail</th>
                </tr>
            </thead>
            @if($zavody->count() != 0)
                <tbody>
                    @foreach($zavody as $zavod)
                        <tr>
                            <td>{{$zavod->za_nazev}}</td>
                            <td>{{str_replace('-', '.', (date('d-m-Y', strtotime($zavod->za_termin))))}}</td>
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
                                @if($zavod->prihlasky->where('uz_id', $uzivatel->getAuthIdentifier())->first() != null)
                                    {{$zavod->prihlasky->where('uz_id', $uzivatel->getAuthIdentifier())->first()->pr_kategorie}}
                                @else
                                    ---
                                @endif
                            </td>
                            <td><a href="{{url("zavod/" . $zavod->za_id)}}">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <p align="center"><em>Pro zvolený filtr nejsou vloženy žádné závody.</em></p>
            @endif
        </table>
    </div>
@endsection
