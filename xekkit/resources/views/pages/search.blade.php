@extends('layouts.app')

@section('title', 'Search') <!-- mostrar o q pesquisou? idk -->

@section('content')
<script defer src="../js/search.js"></script>
<main class="container-xl">
    <!-- TODO: o que pesquisou!!!!!!!!!!! -->
    <h3 class="text-white py-3 border-bottom">Results for: music</h3>
    @include('partials.search.filter_search')
    @include('partials.search.search_content')
</main>

@endsection
