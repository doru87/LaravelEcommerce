<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<link href="{{ secure_asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>
  <div class="container-parent">
      @include('header')
      @yield('content')
      @yield('section-css')
      @yield('section-js')
      @include('footer')  
  </div>    
</body>

<script type="text/javascript">  
  $(document).ready(function(){  
      $('li.dropdown').click(function () {  
          $('li.dropdown').not(this).find('ul').hide();  
          $(this).find('ul').toggle();  
      });  
   });  
  </script>
</html>