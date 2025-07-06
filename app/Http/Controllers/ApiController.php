<?php

namespace App\Http\Controllers;

use App\Models\Dados;
use App\Models\Hidroponico;
use App\Models\User;
use App\Models\UsersHidroponia;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct(
        private User $user,
        private Dados $dados,
        private Hidroponico $hidroponico,
        private UsersHidroponia $usersHidroponia
    ) {
        $this->userMD = $user;
        $this->dadosMD = $dados;
        $this->hidroponicoMD = $hidroponico;
        $this->userHidroponiaMD = $usersHidroponia;
    }

    public function getData(Request $req) {
        try{
            $data = $this->dados->orderByDesc("id")->first();
    
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    public function sendData(Request $req) {
        try{
            $this->dados->create([
                "hidroponia_id" => $req->hidroponia,
                "ph" => $req->ph,
                "temperatura_agua" => $req->temperatura_agua == "nan" || is_null($req->temperatura_agua) ? 0.0 : $req->temperatura_agua,
                "condutividade" => $req->TDS,
                "temperatura_ambiente" => $req->temperatura_ambiente == "nan" || is_null($req->temperatura_ambiente)? 0.0 : $req->temperatura_ambiente,
                "luminosidade" => $req->luminosidade >= 0 ? 0.0 : $req->luminosidade,
                "nivel_baixo" => $req->nivel_baixo === "true",
                "nivel_alto" => $req->nivel_alto === "true",
            ]);
    
    
            return response()->json($req->all(), 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }
}