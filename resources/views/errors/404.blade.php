@extends('layouts.main')

@section('content')
  <section class="text-center m-5 p-5">
    <h1>404 | NotFound</h1>
    <h3>Pagina non trovata</h3>
    <p>{{$exception->getMessage()}}</p>
  </section>

@endsection