@extends('layout')
@section('main')
    
<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>
  
   @if (Session()->has('message'))
   <div class="alert alert-success">
       <p>{{ Session()->get('message') }}</p>
   </div>
       
   @endif
  
   @include('user.healthy')
    
   @include("user.doctor")

   @include("user.latset") 
    
   @include("user.appointment")
 
  

  
   
@endsection