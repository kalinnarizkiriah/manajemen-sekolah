<!DOCTYPE html>
<html lang="en">

{{-- bagian head--}}
@include('jadwal.partials.head')

<body>
    <div class="app">
        {{-- bagian sidebar --}}
        @include('jadwal.components.sidebar')

            {{-- bagian konten --}}
            @yield('content')
    </div>
</body>
</html>