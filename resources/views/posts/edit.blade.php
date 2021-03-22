@extends('layouts.app')


@section('content')

<div class="container">
  
  <div class="card">


  <h2>Create a post</h2>

  <div class="card-body">


  {!! Form::model($post, ['action' => ['PostController@update',$post->id], 'method' => 'POST']) !!}

   
<div class="form-group">

  {{Form::label('title', 'Title')}}

  {{Form::text('title', $post->title??'', ['class'=> 'form-control', 'placeholher'=> 'Enter Post Title'])}}

  </div>

  <div class="form-group">

  {{Form::label('body', 'Post Body')}}

  {{{Form::textarea('body', $post->body??'', ['class'=>'form-control', 'placeholder' => 'Enter Post Body'])}}}



  
</div>

  <div class="form-group">

  {{Form::hidden('_method', 'PUT')}}
  {{Form::submit('Edit the Post', ['class' => 'btn btn-primary'])}}


</div>


{!! Form::close() !!}

  
  
  
  
  
  
  </div>
  
  
  </div>
 


 

</div>

@endsection