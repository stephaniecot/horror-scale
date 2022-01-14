@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
       
        <span class="error-msg">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
                </span>
    </div>
@endif
