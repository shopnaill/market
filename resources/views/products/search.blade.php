@extends('layouts.app')

@section('content')

    <div class="container bootstrap snippet">

        <h2>Results about "{{$keyword}}" </h2>
        <div class="row">

            @forelse($products as $product)
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="card product-card" >
                        <span class="price">{{$product->price}} EGP</span>
                        <a href="{{route('product',$product->id)}}">
                            <img class="card-img-top prod-img" src="{{asset('storage/'.$product->img)}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">{{$product->description}}</p>
                                <a  href="{{route('order',$product->id)}}" class="btn btn-primary">Order</a>
                            </div>
                        </a>
                    </div>
                </div>
            @empty

                <h6 class="text-center">{{"No Products Found."}}</h6>

            @endforelse

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
