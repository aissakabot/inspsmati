<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/png" href="images/favico.png">
        <title>المعهد الوطني المتخصص في التكوين المهني والتمهين |@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
         <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

        <!-- Compiled and minified CSS -->
  
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
   <link rel="stylesheet" href="{{asset('css/bootstrap-arabic.css')}}">
      
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
  <link rel='stylesheet' href="{{asset('css/coustum.css')}}">

 
          

      @yield('style')  
    </head>
    <body>
    @include('layouts.header')

@yield("content")


@include('layouts.footer')


<script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
      
      
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/coustum.js')}}"></script>
      
      <script src="{{asset('js/wow.min.js')}}"></script>
              <script>
              new WOW().init();
              </script>
              <script src="{{asset('js/sweetalert.js')}}"></script>
@include('admin.layouts.fmessage')
@yield('script')
    </body>
</html>
