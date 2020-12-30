@extends('layouts.app')

@section('content')



    <div class="container bootstrap snippet">
@php
    $total = array();
@endphp
        <h2>الطلبات</h2>
        <div class="row mt-4">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">عنوان التوصيل</th>
                    <th scope="col">رقم الهاتف</th>
                    <th scope="col">اجمالي السعر</th>
                    <th scope="col">تحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $key => $order)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>
                            @php
                             $total2 =0;
                            @endphp
                            @foreach($order_items as $key => $item)
                                @if ($item->order_id == $order->id )
                                    @php $total2 +=  $item->product->price * $item->quantity @endphp
                                @endif

                            @endforeach
                            {{$total2}}  EGP
                        </td>
                        <td>
                            <div class="btn btn-danger btn-sm">الغاء</div>
                            <div class="btn btn-warning btn-sm">قبول</div>
                        </td>
                    </tr>
                    <tr>

                        <th scope="col">الصورة</th>
                        <th scope="col">المنتج</th>
                        <th scope="col">الكمية</th>
                        <th scope="col">السعر</th>
                        <th scope="col">الاجمالي</th>
                    </tr>
                        @foreach($order_items as $order_item)
                            @if ($order_item->order_id == $order->id )
                            <th scope="row">
                              <img style="width: 6.142857rem;height: 6.142857rem;" class="card-img-top prod-img" src="{{asset('storage/'.$order_item->product->img)}}" alt="Card image cap">
                            </th>
                            <td>
                               <a target="_blank" href="{{route('product',$order_item->product->id)}}">{{$order_item->product->name}}</a>
                            </td>

                        <td>{{$order_item->quantity}}</td>
                        <td>{{$order_item->product->price}} EGP</td>
                        <td>{{$order_item->product->price * $order_item->quantity}} EGP</td>


                    </tr>
                    @endif

                    @endforeach





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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


@endsection
