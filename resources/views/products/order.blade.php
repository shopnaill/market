@extends('layouts.app')

@section('content')

    <div class="container bootstrap snippet">

        <h2>Order Product</h2>
        <div class="row">

            <div class="col-md-4">
                <img class="card-img-top" src="{{asset('storage/'.$product->img)}}" alt="Card image cap">
                <h4> {{$product->name}}</h4>
            </div>
            <div class="col-md-8">

              <form action="{{route('create_order',$product->id)}}" method="post">
                  @csrf
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="address">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" name="quantity" id="quantity">
                  <br>
                  <button type="submit" class="btn btn-primary">Order Now</button>
              </form>
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
