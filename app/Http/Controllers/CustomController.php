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
        if((new CustomAuthController)->isLogin() === true) {
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

            $prihlaskyvicArray = [];

            foreach ($prihlaskyvic as $item) {
                $prihlaskyvicArray[] = $item;
            }

            for ($i=0; $i < count($prihlaskyvicArray); $i++) {
                $prihlaskyvicArray[$i]->poleUbytovani = explode(";",$prihlaskyvicArray[$i]->zavvic->za_ubyt);
            }

            $prihlaskyvicCollection = collect($prihlaskyvicArray);

            $akceAll = Akce_prihlaska::all()
                ->where('pr_ucast', '=', 0)
                ->where('uz_id', $uzivatel->getAuthIdentifier());

            $akceFiltr = [];

            foreach ($akceAll as $item) {
                $akceFiltr[] = $item;
            }

            for ($i = 0; $i < count($akceFiltr); $i++) {
                $akceFiltr[$i]->ak_zacatek_datum = $akceFiltr[$i]->akce()->first()->ak_zacatek_datum;
            }

            $akceFiltrColection = collect($akceFiltr);

            $akceFiltrColection = $akceFiltrColection
                ->where('ak_zacatek_datum', '>=', Carbon::now())
                ->sortBy('ak_zacatek_datum');

            return view("home", [
                'uzivatel' => $uzivatel,
                'aktuality' => $aktuality,
                'prihlasky' => $prihlasky,
                'prihlaskyvic' => $prihlaskyvicCollection,
                'akce' => $akceFiltrColection
            ]);
        }
        else {
            return (new CustomAuthController)->isLogin();
        }
    }


    public function zavody() {
        if((new CustomAuthController)->isLogin() === true) {
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
            return (new CustomAuthController)->isLogin();
        }
    }


    public function zavod($zav_id) {
        if((new CustomAuthController)->isLogin() === true) {
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
            return (new CustomAuthController)->isLogin();
        }
    }


    public function vicedenniZavody() {
        if((new CustomAuthController)->isLogin() === true) {
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
            return (new CustomAuthController)->isLogin();
        }
    }


    public function vicedenniZavod($zav_id) {
        if((new CustomAuthController)->isLogin() === true) {
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
            return (new CustomAuthController)->isLogin();
        }
    }


    public function zavodLogin($zav_id) {
        if((new CustomAuthController)->isLogin() === true) {
            $uzivatel = \auth()->user();

            $zavod = Zavody::where('za_id', $zav_id)->first();

            $prihlaska = Prihlasky::all()
                ->where('za_id', $zav_id)
                ->where('uz_id', $uzivatel->getAuthIdentifier())
                ->first();

            if ($zavod == null)
                abort(404);
            elseif ($prihlaska != null) {
                redirect()->action([CustomAuthController::class, '/zavod/' . $zav_id])->withErrors('You are already login');
            }
            else {
                return view("zavodLogin", [
                    'uzivatel' => $uzivatel,
                    'zavod' => $zavod
                ]);
            }
        }
        else {
            return (new CustomAuthController)->isLogin();
        }
    }


    public function zavodLoginPost(Request $request) {
        if((new CustomAuthController)->isLogin() === true) {

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
            return (new CustomAuthController)->isLogin();
        }
    }


    public function zavodLogoutPost(Request $request) {
        if((new CustomAuthController)->isLogin() === true) {

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
            return (new CustomAuthController)->isLogin();
        }
    }


    public function vicedenniZavodLogin($zav_id) {
        if((new CustomAuthController)->isLogin() === true) {
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
            return (new CustomAuthController)->isLogin();
        }
    }


    public function vicedenniZavodLoginPost(Request $request) {

    }


    public function user() {
        if((new CustomAuthController)->isLogin() === true) {
            $uzivatel = \auth()->user();

            $chyba = null;
            $uspech = null;

            return view("user", [
                'uzivatel' => $uzivatel,
                'chyba' => $chyba,
                'uspech' => $uspech
            ]);
        }
        else {
            return (new CustomAuthController)->isLogin();
        }
    }

    public function userDataChange(Request $request) {
        if((new CustomAuthController)->isLogin() === true) {
            $uzivatel = \auth()->user();

            $kod = true;
            $chyba = null;
            $uspech = null;

            if($request->input('email') != null) {
                $uzivatel->uz_email = $request->input('email');

                if($request->input('phone') != null) {
                    $uzivatel->uz_mobil = $request->input('phone');
                }
                if($request->input('hrEmail') != null) {
                    $uzivatel->uz_maillist = 1;
                }
                else {
                    $uzivatel->uz_maillist = 0;
                }
                if($request->input('trInfo')) {
                    $uzivatel->uz_mailtrenink = 1;
                }
                else {
                    $uzivatel->uz_mailtrenink = 0;
                }
                if($request->input('password1') != null) {
                    if($request->input('password1') === $request->input('password2')) {
                        $uzivatel->uz_heslo = bcrypt($request->input('password1'));
                    }
                    else {
                        $chyba = "Zadaná hesla se neshodují";
                        $kod = false;
                    }
                }
            }
            else
                $chyba = "Nezadali jste žádný email";

            if($uzivatel->save() and $kod) {
                $uspech = "Uložení proběhlo úspěšně.";
            }
            else if($kod) {
                $chyba = "Uložení selhalo, zkuste to prosím později";
            }

            return view("user", [
                'uzivatel' => $uzivatel,
                'chyba' => $chyba,
                'uspech' => $uspech
            ]);
        }
        else {
            return (new CustomAuthController)->isLogin();
        }
    }
}
