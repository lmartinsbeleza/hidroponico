@props([
  'modal_id' => (string) 'modal_id',
  'class' => 'btn-primary',
  'style' => '',
  '_disabled' => false,
  'id' => 'btn_modal',
  'hidden' => ''
])

<button type="button" id="{{ $id }}" class="{{ "btn ".$class  }}" {{ $hidden }} data-bs-toggle="modal" data-bs-target="{{ "#".$modal_id }}" style="{{$style}}" @disabled($_disabled)>
  {{ $slot }}
</button>
