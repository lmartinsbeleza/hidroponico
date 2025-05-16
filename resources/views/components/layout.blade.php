@props([ 'title' => 'HidroView', 'background_color' => '', 'class' => '', 'disableNavigation' => false ])
<!DOCTYPE html>
<html lang="pt-br" class="bg-gray-200">
  <head>
    <title>{{ $title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Arquivos de Estilização -->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('mobrise/images/emblema-96x85.png') }}" type="image/x-icon">

    <!-- Arquivos JavaScript -->
    <script src="{{ asset('library/jquery/jquery.js') }}" defer></script>
    <script src="{{ asset('library/jquery-mask/dist/jquery.mask.js') }}" defer></script>
    <script src="{{ asset('library/bootstrap-5.3.6/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('library/apexcharts/apexcharts.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body class="{{ $background_color.' font-sans antialiased' }}">
    @if(!$disableNavigation)
      <x-navigation/>
    @endif
    <x-notification />
    <div class="{{ $class }}" style="width: 100%; height: 100%;">
      {{ $slot }}
    </div>
  </body>
</html>
