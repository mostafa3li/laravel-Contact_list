{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contact List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
</head>
<body> --}}


@extends('layouts.app')

@section('contacts')
  <main class="container">
    <h1 class="text-center mt-5">Contact List</h1>

    <section class="row">
      <div class="col-md-8 offset-md-2 mb-5 mt-5">
        <!-- display success msg -->
        @if(Session::has('success'))
          <div class="alert alert-success">
            <strong>Great: </strong>{{Session::get('success')}}
          </div>
        @endif

        <!-- display errors -->
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>ERORR:</strong>
            <ul>
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @yield('add')
        {{-- </div> --}}
        
        {{-- @yield('display') --}}
        
        @yield('update')

      </div>
    </section>
  </main>
@endsection
{{-- 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html> --}}