<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
    {{-- css --}}
  </head>

  <body>

    <!-- Awal page content -->
    @yield('content')
    <!-- Akhir Content -->

    <!-- awal footer -->
    @include('includes.footer')
    <!-- akhir footer -->

    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
    {{-- script --}}
  </body>
</html>
