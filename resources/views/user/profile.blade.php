@extends('layouts.app')

@section('content')

    <div class="container bootstrap snippet">

        <div class="row">
            <h5>Profile Info</h5>
            <div class="col-md-12">
                 <p>Name : {{Auth::user()->name}}</p>
                 <p>E-mail : {{Auth::user()->email}}</p>
             </div>
            <h5>Orders Info</h5>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">1  <img style="width: 6.142857rem;height: 6.142857rem;" class="card-img-top prod-img" src="{{asset('storage/'.$order->product->img)}}" alt="Card image cap"></th>
                            <td><a target="_blank" href="{{route('product',$order->product->id)}}">{{$order->product->name}}</a></td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->product->price}} EGP</td>
                            <td>{{$order->product->price * $order->quantity}} EGP</td>

                            <td>
                                <div class="btn btn-danger btn-sm">Cancel</div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
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
