<?php

namespace App\Http\Controllers;

use App\Models\Akce_prihlaska;
use App\Models\Aktuality;
use App\Models\Prihlasky;
use App\Models\Prihlaskyvic;
use App\Models\Zavody;
use App\Models\Zavvic;
use Carbon\Carbon;
use App\Http\Controllers\CustomAuthController as Aut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomController extends Controller
{
    public function home() {
        if(Aut::isLogin() === true) {
            $uzivatel = \auth()->user();

            $aktuality = Aktuality::all()->where('ak_znak', '=', 0)->sortByDesc('ak_id');

            $prihlasky = Prihlasky::all()
                ->where('uz_id', $uzivatel->getAuthIdentifier())
                ->where('pr_datum', '>=', Carbon::now())
                ->sortBy('pr_datum');

            $prihlaskyvic = Prihlaskyvic::all()
                ->where('uz_id', $uzivatel->getAuthIdentifier())
                ->where('pr_datum', '>=', Carbon::now())
                ->sortBy('pr_datum');

            for ($i=0; $i < $prihlaskyvic->count(); $i++) {
                $prihlaskyvic[$i]->poleUbytovani = explode(";",$prihlaskyvic[$i]->zavvic->za_ubyt);
            }

            $akceAll = Akce_prihlaska::all()
                ->where('pr_ucast', '=', 0)
                ->where('uz_id', $uzivatel->getAuthIdentifier());

            for ($i = 0; $i < $akceAll->count(); $i++) {
                $akceAll[$i]->ak_zacatek_datum = $akceAll[$i]->akce()->first()->ak_zacatek_datum;
            }

            $akceAll = $akceAll
                ->where('ak_zacatek_datum', '>=', Carbon::now())
                ->sortBy('ak_zacatek_datum');

            return view("home", [
                'uzivatel' => $uzivatel,
                'aktuality' => $aktuality,
                'prihlasky' => $prihlasky,
                'prihlaskyvic' => $prihlaskyvic,
                'akce' => $akceAll
            ]);
        }
        else {
            return Aut::isLogin();
        }
    }


    public function zavody() {
        if(Aut::isLogin() === true) {
            $uzivatel = \auth()->user();

            $zavody = Zavody::all()
                ->sortBy('za_termin');

            $date = Carbon::now();
            $rok = $date->format("Y");

            return view("zavody", [
                'uzivatel' => $uzivatel,
                'rok' => $rok,
                'zavody' => $zavody
            ]);
        }
        else {
            return Aut::isLogin();
        }
    }


    public function zavod($zav_id) {
        if(Aut::isLogin() === true) {
            $uzivatel = \auth()->user();

            $zavod = Zavody::where('za_id', $zav_id)->first();

            if ($zavod == null)
                abort(404);
            else {
                return view("zavod", [
                    'uzivatel' => $uzivatel,
                    'zavod' => $zavod
                ]);
            }
        }
        else {
            return Aut::isLogin();
        }
    }


    public function vicedenniZavody() {
        if(Aut::isLogin() === true) {
            $uzivatel = \auth()->user();

            $zavody = Zavvic::all()
                ->sortBy('za_termin');

            $date = Carbon::now();
            $rok = $date->format("Y");

            for ($i=0; $i < $zavody->count(); $i++) {
                $zavody[$i]->za_konec_prihl = $zavody[$i]->termin_zavvic()->where('ter_tag', $zavody[$i]->za_terminprihl)->first()->ter_datum;
            }

            return view("vicedenniZavody", [
                'uzivatel' => $uzivatel,
                'rok' => $rok,
                'zavody' => $zavody
            ]);
        }
        else {
            return Aut::isLogin();
        }
    }


    public function vicedenniZavod($zav_id) {
        if(Aut::isLogin() === true) {
            $uzivatel = \auth()->user();

            $zavod = Zavvic::where('za_id', $zav_id)->first();

            $zavod->za_konec_prihl = $zavod->termin_zavvic()->where('ter_tag', $zavod->za_terminprihl)->first()->ter_datum;

            $zavod->za_kat_cena = $zavod->zavvic_termin_prihlasek()->get()->where('za_terminprihl', $zavod->za_terminprihl);

            if ($zavod == null)
                abort(404);
            else {
                return view("vicedenniZavod", [
                    'uzivatel' => $uzivatel,
                    'zavod' => $zavod
                ]);
            }
        }
        else {
            return Aut::isLogin();
        }
    }


    public function zavodLogin($zav_id) {
        if(Aut::isLogin() === true) {
            $uzivatel = \auth()->user();

            $zavod = Zavody::where('za_id', $zav_id)->first();

            $prihlaska = Prihlasky::all()
                ->where('za_id', $zav_id)
                ->where('uz_id', $uzivatel->getAuthIdentifier())
                ->first();

            if ($zavod == null)
                abort(404);
            elseif ($prihlaska != null) {
                //return redirect()->action(); // už jsi přihlášen, zpět na kartu závodu, nevím jak správně redirectnout
            }
            else {
                return view("zavodLogin", [
                    'uzivatel' => $uzivatel,
                    'zavod' => $zavod
                ]);
            }
        }
        else {
            return Aut::isLogin();
        }
    }


    public function zavodLoginPost(Request $request) {
        if(Aut::isLogin() === true) {

            $uzivatel = \auth()->user();

            $prihlaska = new Prihlasky();

            $prihlaska->uz_id = $uzivatel->getAuthIdentifier();
            $prihlaska->za_id = $request->input('za_id');
            $prihlaska->pr_kategorie = $request->input('kategorie');
            $prihlaska->pr_doprava = $request->input('doprava');
            $prihlaska->pr_ubytovani = $request->input('ubytovani');
            $prihlaska->pr_prijmeni = $uzivatel->uz_prijmeni;
            $prihlaska->pr_poznamka = $request->input('poznamka');
            $prihlaska->pr_datum = Zavody::where('za_id', $request->input('za_id'))->first()->za_termin;
            $prihlaska->save();

            $akce = "Přihlášení na závod";
            $presmerovani = url("/zavod/" . $request->input('za_id'));
            $zpetNa = "detail závodu";

            return view("success", [
                'akce' => $akce,
                'presmerovani' => $presmerovani,
                'zpetNa' => $zpetNa
            ]);
        }
        else {
            return Aut::isLogin();
        }
    }


    public function zavodLogoutPost(Request $request) {
        if(Aut::isLogin() === true) {

            $uzivatel = \auth()->user();

            $prihlaska = Prihlasky::all()
                ->where('za_id', $request->input('za_id'))
                ->where('uz_id', $uzivatel->getAuthIdentifier())
                ->first();

            $prihlaska->delete();

            $akce = "Odhlášení";
            $presmerovani = url("/zavod/" . $request->input('za_id'));
            $zpetNa = "detail závodu";

            return view("success", [
                'akce' => $akce,
                'presmerovani' => $presmerovani,
                'zpetNa' => $zpetNa
            ]);
        }
        else {
            return Aut::isLogin();
        }
    }


    public function vicedenniZavodLogin($zav_id) {
        if(Aut::isLogin() === true) {
            $uzivatel = \auth()->user();

            $zavod = Zavvic::where('za_id', $zav_id)->first();

            if ($zavod == null)
                abort(404);
            else {
                return view("zavodVicedenLogin", [
                    'uzivatel' => $uzivatel,
                    'zavod' => $zavod
                ]);
            }
        }
        else {
            return Aut::isLogin();
        }
    }


    public function vicedenniZavodLoginPost(Request $request) {

    }
}
