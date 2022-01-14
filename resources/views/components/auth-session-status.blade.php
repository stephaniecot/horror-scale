@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'error-msg']) }}>
        {{ $status }}
    </div>
@endif
