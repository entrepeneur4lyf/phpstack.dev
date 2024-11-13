{{-- Load all enabled Mantine stylesheets in the order defined in config --}}
@foreach(config('mantine.stylesheets', []) as $style => $enabled)
    @if($enabled)
        <link rel="stylesheet" href="{{ $style }}" />
    @endif
@endforeach
