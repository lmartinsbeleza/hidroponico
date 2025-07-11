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
            $utlimo_dado = $data = $this->dados->orderByDesc("id")->first();
            $this->dados->create([
                "hidroponia_id" => $req->hidroponia,
                "ph" => $req->ph,
                "temperatura_agua" => $req->temperatura_agua == "nan" || is_null($req->temperatura_agua) ? 0.0 : $req->temperatura_agua,
                "condutividade" => $req->TDS,
                "temperatura_ambiente" => $req->temperatura_ambiente == "nan" || is_null($req->temperatura_ambiente)? 0.0 : $req->temperatura_ambiente,
                "luminosidade" => $req->luminosidade < 0 || $req->luminosidade == "nan" || is_null($req->luminosidade) ? 0.0 : $req->luminosidade,
                "humidade" => $req->humidade_ambiente == "nan" || is_null($req->humidade_ambiente)? 0.0 : $req->humidade_ambiente,
                "nivel_baixo" => $req->nivel_baixo === "true",
                "nivel_alto" => $req->nivel_alto === "true",
                'motor_principal' => $utlimo_dado->motor_principal,
                'motor_agua_limpa' => $utlimo_dado->motor_agua_limpa,
                'motor_fertilizante' => $utlimo_dado->motor_fertilizante,
                'motor_acido' => $utlimo_dado->motor_acido,
                'motor_base' => $utlimo_dado->motor_base,
            ]);
    
            return response()->json($req->all(), 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    public function updateData(Request $req) {
        try{
            $data = $this->dados->orderByDesc("id")->first();
            
            if ($req->isMethod('post')) {
                $data->update([
                    'motor_principal' => $req->motorPrincipal ?? $utlimo_dado->motorPrincipal,
                    'motor_agua_limpa' => $req->motorAguaLimpa ?? $utlimo_dado->motorAguaLimpa,
                    'motor_fertilizante' => $req->motorFertilizante ?? $utlimo_dado->motorFertilizante,
                    'motor_acido' => $req->motorAcido ?? $utlimo_dado->motorAcido,
                    'motor_base' => $req->motorBase ?? $utlimo_dado->motorBase,
                ]);
            }
            
            return response()->json([
                'motorPrincipal' => $data->motor_principal,
                'motorAguaLimpa' => $data->motor_agua_limpa,
                'motorFertilizante' => $data->motor_fertilizante,
                'motorAcido' => $data->motor_acido,
                'motorBase' => $data->motor_base,
            ]);
        }catch(\Excpetion $ex){
            return response()->json($ex->getMessage(), 400);
        }
    }
}