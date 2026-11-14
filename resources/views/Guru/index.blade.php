<!DOCTYPE html>
<html lang="id">

{{-- bagian head--}}
@include('guru.partials.head')

<body>
    <div class="app">
        {{-- bagian sidebar --}}
        @include('guru.components.sidebar')

        <div style="flex: 1; min-width: 0;">
            @if (session('success'))
                <div class="alert" style="margin: 32px 32px 0;">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert" style="margin: 32px 32px 0; background: #fee2e2; color: #991b1b;">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- bagian konten --}}
            @yield('content')
        </div>
    </div>
</body>
</html>