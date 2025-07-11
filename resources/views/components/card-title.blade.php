@props([
  'background_color' => 'bg-secondary',
  'class' => '',
  'rota' => false,
  'botoes' => false,
  'cadButton' => false
])
<div class="{{ $background_color." mb-4 card d-flex align-items-center align-self-center align-middle justify-content-center shadow flex-row ".$class }}">
  @if($rota)
    <div class="no-print">
      <a class="btn" href="{{$rota}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
      </a>
    </div>
  @endif
  <div class="w-100 text-center">
    <p class="fs-4 text-white m-0 py-2">
      {{ $slot }}
    </p>
  </div>
  @if($botoes)
    <div class="no-print">
      {{ $botoes }}
    </div>
  @endif
</div>
