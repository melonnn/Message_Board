@extends('layouts.app')
@section('content')


<table border=1>
  <tr>
    <td>Name</td>
    <td>Content</td>
    <td></td>
  </tr>
  @foreach ($comments as $comment)
  <tr>
    <td>{{$comment->name}}</td>
    <td>{{$comment->content}}</td>
    <td>
      <form method = "POST" action="/{{$comment->id}}">
	@csrf
        @method('DELETE')
        <input type="submit" value="Delete"></input>
        </form>
   </td>
  </tr>
@endforeach
</table>

<form method = "POST" action="/">
    @csrf
    <input type="text" placeholder="content" name="content" >
    <input type="submit"></input>
</form>
@endsection

