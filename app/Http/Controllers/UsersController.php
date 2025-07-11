<?php

namespace App\Http\Controllers;

use App\Models\Dados;
use App\Models\Hidroponico;
use App\Models\User;
use App\Models\UsersHidroponia;
use Illuminate\Http\Request;

class UsersController extends Controller
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

    public function index(Request $req) {
        $users = $this->user->latest()->paginate(12);
        $params = $req->all();

        return view("users.index", [
            'users' => $users,
            'params' => $params
        ]);
    }

    public function create() {
        try{
            return view('users.create', [

            ]);
        }catch(\Exception $err){
            return redirect()->back()->withErrors($err->getMessage());
        }
    }

    public function edit(User $user) {
        try{
            return view('users.edit', [
                'user' => $user
            ]);
        }catch(\Exception $err){
            return redirect()->back()->withErrors($err->getMessage());
        }
    }

    public function store(Request $req) {
        try{
            $user = $this->userMD->create([
                'nome' => $req->nome,
                'email' => $req->email,
                'password' => bcrypt($req->password),
                'cpf' => $req->cpf,
                'rg' => $req->rg,
                'siape' => $req->siape,
                'dataadmissao' => $req->dataadmissao,
                'tipoUsuarios_id' => $req->tipoUsuario_id,
                'professor' => $req->professor
            ]);

            return redirect()->route('users.index')->with('message', "Usuário cadastrado com sucesso!");
        }catch(\Exception $err){
            return redirect()->back()->withErrors($err->getMessage());
        }
    }

    public function update(User $user, Request $req) {
        try{
            $user->update([
                'nome' => $req->nome,
                'email' => $req->email,
                'password' => $req->password ? bcrypt($req->password) : $user->password,
                'cpf' => $req->cpf,
                'rg' => $req->rg,
                'siape' => $req->siape,
                'dataadmissao' => $req->dataadmissao,
                'tipoUsuarios_id' => $req->tipoUsuario_id,
                'professor' => $req->professor
            ]);

            return redirect()->back()->with('message', "Usuário Atualizado com sucesso!");
        }catch(\Exception $err){
            return redirect()->back()->withErrors($err->getMessage());
        }
    }
}
