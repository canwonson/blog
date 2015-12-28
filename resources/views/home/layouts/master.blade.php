<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ $meta_description }}">
  <meta name="author" content="{{ config('home.author') }}">

  <title>{{ $title or config('home.title') }}</title>
  <link rel="alternate" type="application/rss+xml" href="{{ url('rss') }}" title="RSS Feed {{ config('home.title') }}">

  {{-- Styles --}}
  <link href="/assets/css/home.css" rel="stylesheet">
  @yield('styles')

  {{-- HTML5 Shim and Respond.js for IE8 support --}}
  <!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
@include('home.partials.page-nav')

@yield('page-header')
@yield('content')

@include('home.partials.page-footer')

{{-- Scripts --}}
<script src="/assets/js/home.js"></script>
@yield('scripts')

</body>
</html>