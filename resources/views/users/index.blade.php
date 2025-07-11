<x-layout>
  <x-card>
    <x-card-title>LISTA DE USUÁRIOS</x-card-title>

    <div class="row row-gap-2">      
      <div class="col-md-2">
        <form action="{{ route('users.store') }}" method="post">
          @csrf
          <x-button-modal modal_id="create_user" class="btn-primary w-100">
            <i class="fa fa-plus"></i> Cadastrar
          </x-button-modal>
          <x-modal modal_id="create_user" title="Cadastrar Usuário">
            @include('users._partials.form')
          </x-modal>
        </form>
      </div>
    </div>

    <div class="table-responsive mt-3">
      <table class="table table-stripped table-bordered align-middle">
        <thead>
          <th>Nome</th>
          <th style="width: 30%">E-mail</th>
          <th style="width: 20%">Adm ?</th>
        </thead>
        <tbody>
          @forelse($users as $user)
            <tr>
              <td>
                {{ $user->name }} <br>
              </td>
              <td>
                {{ $user->email }}
              </td>
              <td>
                {{ $user->admin ? "SIM" : "NÃO" }}
              </td>
            </tr>
          @empty
            <td class="fs-3 text-center fw-bold text-danger" colspan="8">
              <i class="fa fa-triangle-exclamation"></i> NADA ENCONTRADO!
            </td>
          @endforelse
        </tbody>
      </table>
      {!! $users->appends($params)->links() !!}
    </div>
  </x-card>
</x-layout>