<div {{ $attributes }} wire:key="mantine-{{ $uuid }}">
    <div 
        data-mingle="{{ $component() }}" 
        data-mingle-data="{{ json_encode($mingleData()) }}"
        @if(method_exists($this, 'getHookConfig'))
        data-mantine-hooks="{{ json_encode([
            'hooks' => array_keys($this->mantineHooks ?? []),
            'configs' => $this->mantineHookConfigs ?? []
        ]) }}"
        @endif
        data-mantine-color-scheme="{{ $this->getColorScheme() }}"
    >
        {{ $slot }}
    </div>
</div>

@pushOnce('scripts')
    @vite(['resources/js/mantineHooks.js'])
@endPushOnce
