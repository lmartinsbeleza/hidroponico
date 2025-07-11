<nav class="navbar navbar-expand-xl bg-success mb-1 no-print">
  <div class="container-fluid px-2 gap-2">
      <img src="{{ asset("img/HidroView.ico") }}" alt="Icone HidroView" style="height: 3rem;">
    <div class="d-flex flex-column align-items-center navbar-brand m-auto" style="min-width: 5rem;">
      <a class="text-white m-0 fw-bold" href={{ route('homePage') }} style="text-decoration: none; font-size: 20px">HidroView</a>
      <!-- <small class="text-white m-0 " style="font-size: 13px">PERFIL</small> -->
    </div>
    <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="28" height="28" fill="white">
          <path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/>
        </svg>
      </span>
    </button>
    <div class="collapse navbar-collapse gap-2 me-auto" id="navbarTogglerDemo02">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-item text-white" href="{{ route('dashboard') }}">PAINEL</a>
        </li>
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GERENCIAR</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('users.index') }}">USUÁRIOS</a></li>
            </ul>
          </li>
        @endauth
      </ul>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <div class="d-flex">
          @auth()
          <li class="nav-item dropdown" style="list-style-type: none;">
            <button class="btn dropdown dropdown-toggle text-white me-auto" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="font-size: 15px">
              {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu1">
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
            </ul>
          </li>
          @else
            <a href="{{ route('login') }}" class="btn btn-primary border border-dark">Realizar Login</a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</nav>