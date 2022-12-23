@props(['messages'])

@if ($messages)
    @foreach ($messages as $message)
        <div class="text-rose-600">
            {{ $message }}
        </div>
    @endforeach
@endif
