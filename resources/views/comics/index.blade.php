@extends('layouts.main')

@section('content')
  <section class="container">
    <h1>I nostri fumetti</h1>

    @if (session('deleted'))
      <div class="alert alert-success" role="alert">
        <strong>{{session('deleted')}}</strong>
        eliminato correttamente!
      </div>
    @endif
    <section class="mt-5">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Publication Date</th>
            <th colspan="3" scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($comics as $comic )
            <tr>
              <th>{{$comic->id}}</th>
              <th>{{$comic->title}}</th>
              <th>{{$comic->date}}</th>
              <th><a href="{{route('comics.show',$comic)}}" class="btn btn-success">SHOW</a></th>
              <th><a class="btn btn-info" href="{{route('comics.edit',$comic)}}">EDIT</a></th>
              <th>
                <form action="{{route('comics.destroy',$comic)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">DELETE</button>
                </form>
              </th>
            </tr>
          @endforeach
          
        </tbody>
      </table>
    </section>

    <section>
      {{$comics->links()}}
    </section>

  </section>

@endsection