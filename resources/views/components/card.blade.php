@props([
    "header" => false,
    "footer" => false,
    "class" => "",
    "classHeader" => "",
    "classBody" => "",
    "style" => "",
    "margin" => "mx-2"
])

<div class="{{ $class." ".$margin." card rounded border"}}" style="{{ $style }}">
    @if($header)
        <div class="{{$classHeader." card-header text-center"}}">
            {{ $header }}
        </div>
    @endif
    <div class="{{$classBody." card-body"}}">
        <div class="card-text h-25">
            {{ $slot }}
        </div>
    </div>
    @if($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
