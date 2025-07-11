<x-card>
    <x-card-title>DADOS DO USUÁRIO</x-card-title>

    <div class="row row-gap-2">
        <div class="col-12">
            <label for="name" class="required">NOME</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $user->name ?? old('name') }}" required @disabled(isset($disabled))>
        </div>
        <div class="col-12">
            <label for="email" class="required">EMAIL</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email ?? old('email') }}" required @disabled(isset($disabled))>
        </div>
        @if(auth()->check() && auth()->user()->admin)
            <div class="col-12">
                <label for="admin">ADMINISTRADOR ?</label>
                <select name="admin" id="admin" class="form-select">
                    <option @selected(isset($user) && !$user->admin) value="0">Não</option>
                    <option @selected(isset($user) && $user->admin) value="1">Sim</option>
                </select>
            </div>
        @endif
    </div>
</x-card>