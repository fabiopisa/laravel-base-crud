@extends('layouts.main')

@section('content')
  <section class="container">
    <div class="mt-5">
      <h1>{{$comic['title']}}</h1>
    </div>

    <div class="row mt-5">
      <div class="col-md-6">
        <img class="img-fluid" src="{{$comic['image']}}" alt="">
      </div>

      <div class="col-md-6">
        <div>
          <h3>Series: {{$comic['series']}}</h3>
        </div>
        <div class="mt-3">
          <h3>Type: {{$comic['type']}}</h3>
        </div>
        <div class="mt-3">
          <span>Price: </span>
          <span class="badge bg-primary">{{$comic['price']}} $</span>
        </div>
        <div class="mt-3">
          <h4>publication date: {{$comic['date']}}</h4>
        </div>
        <div class="mt-3">
          <p><strong>Description:</strong> {{$comic['description']}}</p>
        </div>
        <div class="mt-3">
          <a href="{{route('comics.index')}}"><-Back</a>
        </div>
        
      </div>
    </div>
  </section>

@endsection