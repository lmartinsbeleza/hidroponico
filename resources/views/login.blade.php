<x-layout>
    <div class="d-flex align-items-center py-4" style="width: 100%; height: 100%;">
        <div class="container card p-3" style="max-width: 430px">
            <section class='login-header text-center mb-3'>
                <img src="{{ asset("img/Hidroview - Logo.png") }}" style="max-width:256px">
            </section>

            <form action="{{ route('authenticate') }}" method='POST'>
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name='email' class="form-control py-2" placeholder="E-mail" aria-label="E-mail" aria-describedby="email">
                    <span class="input-group-text" style="width: 45px" id="email">
                        <i class="fa-solid fa-user" style="color: #808080;"></i>
                    </span>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name='password' maxLength="40" class="form-control py-2" placeholder="Senha" aria-label="Senha" aria-describedby="senha">
                    <span class="input-group-text" style="width: 45px" id="password">
                        <i class="fa-solid fa-lock" style="color: #808080;"></i>
                    </span>
                </div>
                <div class="d-grid mx-auto">
                    <button id='submit' type="submit" class="login-form-send-button btn btn-primary py-2"><i class="ace-icon fa fa-sign-in"></i> Entrar</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>