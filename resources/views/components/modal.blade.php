@props([
    'modal_id' => (string) 'modal_id',
    'class' => '',
    'title' => 'Modal Title',
    'footer' => 'Salvar',
    'size' => '',
    'type_footer' => 'btn-primary salvar'
])

<div class="modal fade" id="{{ $modal_id }}" tabindex="-1" aria-labelledby="{{ "#".$modal_id."_label" }}" aria-hidden="true">
    <div class="{{ "modal-dialog modal-dialog-scrollable ".$size }}">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h1 class="modal-title fs-5 text-white" id="{{ $modal_id."_label" }}">{{ $title }}</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="id="{{ $modal_id.'_cancel' }}">Cancelar</button>
                <button type="button" onclick="$(this.form).submit()" class="{{ 'btn '.$type_footer }} " id="{{ $modal_id.'_salvar' }}">{{ $footer }}</button>
            </div>
        </div>
    </div>
</div>