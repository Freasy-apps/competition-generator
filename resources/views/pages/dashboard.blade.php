@extends('layouts.main')

@section('body')
  <h1>Evenementen</h1>
  <ul>
    @foreach ($events as $event)
      <li><a href="#">{{ $event->name }}</a></li>
    @endforeach
  </ul>

  <br />
  <a href="/new-merwestad">Genereer Merwestad competitie</a>
@endsection
