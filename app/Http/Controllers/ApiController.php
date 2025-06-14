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
        $this->dados->create([
            "ph" => 1.1,
            "temperatura" => 1.1,
            "condutividade" => 1.1,
            "hidroponia_id" => 1
        ]);


        return response()->json($req->all(), 200);
    }
}