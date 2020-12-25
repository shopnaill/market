@extends('layouts.app')

@section('content')



    <div class="container bootstrap snippet">

        <h2>Admin Panel</h2>
        <div class="row mt-4">
            <div class="offset-md-3 col-md-6 text-center">
                <a href="{{route('categories')}}" class="btn btn-dark mr-1 ml-1">
                    <i class="fa fa-book"></i> Categories
                </a>
                <a href="{{route('admin_products')}}" class="btn btn-dark mr-1 ml-1">
                    <i class="fa fa-items"></i> Products
                </a>

                <a href="{{route('admin_orders')}}" class="btn btn-dark mr-1 ml-1">
                    <i class="fa fa-info"></i> Orders
                </a>

                <a href="#" class="btn btn-dark mr-1 ml-1">
                    <i class="fa fa-info"></i> Statistics
                </a>
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
