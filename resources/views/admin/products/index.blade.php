@extends('layouts.app')

@section('content')



    <div class="container bootstrap snippet">

        <h2>Products</h2>
        <a href="{{route('add_products')}}" class="btn btn-sm btn-info">Add new</a>
        <div class="row mt-4">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}} EGP</td>
                        <td>
                            <div class="btn btn-danger btn-sm">Delete</div>
                            <a class="btn btn-sm btn-warning" href="{{route('sub_cat',1)}}">View</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
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
