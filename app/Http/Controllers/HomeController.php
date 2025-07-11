<?php

namespace App\Http\Controllers;

use App\Models\Dados;
use App\Models\Hidroponico;
use App\Models\User;
use App\Models\UsersHidroponia;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    public function homePage() {
        return view('homePage');
    }

    public function login() {
        if(auth()->check()) return redirect()->route('dashboard');
        return view('login');
    }

    public function logout() {
        auth()->logout();

        return redirect()->route('homePage');
    }

    public function authenticate(Request $req) {
        if(auth()->attempt(["email" => $req->email, "password" => $req->password])) 
            return redirect()->route('dashboard')->with("message", "Bem-vindo: ".auth()->user()->name);

        return redirect()->back()->withErrors("Usuário ou Senha incorretos!");
    }

    public function dashboard() {
        $data = $this->dados->orderByDesc("id")->take(15)->get();
        
        return view('dashboard', [
            "data" => $data
        ]);
    }
}
