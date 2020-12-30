@extends('layouts.app')

@section('content')

    <div class="container bootstrap snippet">

        <h2>انشاء طلب جديد</h2>
        <div class="row">

            <div class="col-md-4">
                <img class="card-img-top" src="https://cdnimg.webstaurantstore.com/images/products/large/446023/1740001.jpg" alt="Card image cap">
                <h4>مجموعة منتجات</h4>
            </div>
            <div class="col-md-8">

                <form action="{{route('create_order_some')}}" method="post">
                    @csrf
                    <label for="name">الاسم</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <label for="phone">رقم الهاتق</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                    <label for="address">عنوان التوصيل</label>
                    <input type="text" class="form-control" name="address" id="address">
                    <br>
                    <button type="submit" class="btn btn-primary">أطلب الأن</button>
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
