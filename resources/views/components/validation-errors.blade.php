@if ($errors->any())
    <div {{ $attributes }}>
        <div style="font-weight: 500; color: #dc3545;">{{ __('Whoops! Something went wrong.') }}</div>

        <ul style="margin-top: 0.75rem; list-style-type: disc; list-style-position: inside; font-size: 0.875rem; color: #dc3545;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
