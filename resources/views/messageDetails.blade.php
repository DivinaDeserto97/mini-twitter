<!--extend layout master.blade.php -->
@extends('layouts.master')


<!--sets value for section title to "Mini Twitter" (section title is used in messages.blade.php) -->
@section('title', 'Mini Twitter')

<!--starts section content, defines some html for section content and end section content
ts value for section title to "Mini Twitter" (section content is used in messages.blade.php) -->
@section('content')


<h2>Message Details:</h2>

<h3>{{$message->title}}</h3>
<p>{{$message->content}}</p>

<form action="/message/{{$message->id}}" method="post">
  @csrf
  @method('delete')
  <button type="submit">Delete</button>
</form>

@endsection


