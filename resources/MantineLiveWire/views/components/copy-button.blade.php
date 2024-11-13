@php
    // Convert the slot content into a function string that will be evaluated in JavaScript
    $childrenFunction = $slot->isEmpty() 
        ? '(copied, copy) => null'
        : str_replace(["\n", "\r"], '', $slot->toHtml());
@endphp

<div x-data="{ copied: false }" x-mingle="{{ $childrenFunction }}"></div>
