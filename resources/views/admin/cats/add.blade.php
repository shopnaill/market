@extends('layouts.app')

@section('content')



    <div class="container bootstrap snippet">

        <h2>Categories</h2>
        <div class="row mt-4">
              <form method="post" action="{{route('save_cat')}}">
                  @csrf
                  <label for="name">Name</label>
                  <input id="name" type="text" name="name" class="form-control">
                  <label for="name">Description</label>
                  <textarea id="name"  name="description" class="form-control"></textarea>
                  <input type="submit" class="btn btn-sm btn-info" value="Add">
              </form>
        </div>

    </div>

@endsection


@section('pagescripts')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{('js/popper.min.js')}}"></script>
    <script src="{{('js/bootstrap.min.js')}}"></script>
    <script src="{{('js/holder.min.js')}}"></script>
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
    </script>

@endsection
