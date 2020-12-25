@extends('layouts.app')

@section('content')

    <div class="container bootstrap snippet">

        <h2>Product</h2>
        <div class="row">

            <div class="col-md-2">
                <img class="card-img-top" src="{{asset('storage/'.$product->img)}}" alt="Card image cap">
            </div>
            <div class="col-md-8">
               <h4> {{$product->name}}</h4>
                <p> {{$product->description}}</p>

            </div>
            <div class="col-md-2">
                <h5>Price: {{$product->price}} EGP</h5>
                <a href="{{route('order',$product->id)}}" class="btn btn-primary">Order Now</a>
            </div>
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
