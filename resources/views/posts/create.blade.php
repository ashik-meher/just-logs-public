@extends('layouts.app')


@section('content')

<div class="container">
  
  <div class="card">


 

  <div class="card-body">

  <h2>Create a post</h2>


  {!! Form::open(['action' => 'PostController@store', 'method' => 'POST']) !!}


   
<div class="form-group">

  {{Form::label('title', 'Title')}}

  {{Form::text('title', '', ['class'=> 'form-control', 'placeholher'=> 'Enter Post Title'])}}

  </div>

  <div class="form-group">

  {{Form::label('body', 'Post Body')}}

  {{{Form::textarea('body', '', ['class'=>'form-control', 'placeholder' => 'Enter Post Body'])}}}



  
</div>

  <div class="form-group">
  {{Form::submit('Create a Post', ['class' => 'btn btn-primary'])}}


</div>


{!! Form::close() !!}

  
  
  
  
  
  
  </div>
  
  
  </div>
 


 

</div>

@endsection