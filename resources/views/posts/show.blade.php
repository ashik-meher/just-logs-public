@extends('layouts.app')


@section('content')

<div class="card">

 <div class="card-body">

 @if ($post)
 
 <h3>{{$post->title}}</h3>

<p>{{$post->body}}</p>

<small style="color:blue">Written on </small> <small>{{$post->created_at}}</small> 


<small style="color:blue">Updated </small> <small>{{$post->updated_at}}</small> 

@if (!Auth::guest())
 @if(Auth::user()->id == $post->user_id)


<a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>


{!!Form::open(['action'=>['PostController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right' ])!!}

 {{Form::hidden('_method', 'DELETE')}}

 {{Form::submit('DELETE', ['class'=>'btn btn-danger'])}}

{!! Form::close()!!}
  @endif


@endif




@else

<p>No Such post found!</p>

@endif


<a href="/posts"  class="btn btn-info">Go Back</a>




 </div>


</div>
@endsection
