@php
    // Convert the slot content into a function string that will be evaluated in JavaScript
    $childrenFunction = $slot->isEmpty() 
        ? '(props) => null'
        : str_replace(["\n", "\r"], '', $slot->toHtml());
@endphp

<div x-data="{ fileInputProps: {} }" x-mingle="{{ $childrenFunction }}"></div>
