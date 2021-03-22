@extends('layouts.app')


@section('content')

<div class="mywrapper">

<p>Let's try it out!</p>

<a href="posts/create" class="btn btn-info" style="margin-bottom:20px;">Create a Post</a>

<hr>

<h2>All posts</h2>

</div>



@if(count($posts) > 0)

@foreach ($posts as $post)

<div class="card">

  
  <div class="card-body">
  


     
  <h3>{{$post->title}}</h3>

   <p>{{$post->body}}</p>

   <small style="color:blue">Written on </small> <small>{{$post->created_at}}</small>
 
  
  <a href="posts/{{$post->id}}" class="btn btn-link">See Full Post</a>
  
  
  
  </div>



</div>




<hr>

@endforeach


{{$posts->links()}}

@else 


<p>No posts  found</p>

@endif

@endsection 

