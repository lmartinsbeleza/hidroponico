@if (session('message') || count($errors) > 0)
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
      <div class="toast-header">
        <i class="fa-solid fa-triangle-exclamation" style="color: #ffa348;"></i>&ensp;
        <strong class="me-auto">Aviso!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{ session('message') }}
        @foreach($errors->all() as $error)
          <li class="list-group-item py-1 border border-0">→ {{ $error }}</li>
        @endforeach
      </div>
    </div>
  </div>
@endif

<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="toast_error" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
    <div class="toast-header">
      <i class="fa-solid fa-triangle-exclamation" style="color: #ffa348;"></i>&ensp;
      <strong class="me-auto">Aviso!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" id="toast-body"></div>
  </div>
</div>

