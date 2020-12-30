@extends('layouts.app')

@section('content')

<div class="position-relative slider overflow-hidden bg-light">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" data-src="https://souqcms.s3-eu-west-1.amazonaws.com/cms/boxes/img/desktop/L_1608199612_GW-MB-wowdeals-en.jpg" alt="First slide [800x400]" src="https://souqcms.s3-eu-west-1.amazonaws.com/cms/boxes/img/desktop/L_1608131652_GW-MB-HUAWEI-laptops-en.png" data-holder-rendered="true">

          </div>
          <div class="carousel-item">
            <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="https://souqcms.s3-eu-west-1.amazonaws.com/cms/boxes/img/desktop/L_1608199612_GW-MB-wowdeals-en.jpg" data-holder-rendered="true">

          </div>
          <div class="carousel-item">
            <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="https://souqcms.s3-eu-west-1.amazonaws.com/cms/boxes/img/desktop/L_1608199612_GW-MB-shoes-en.jpg" data-holder-rendered="true">

          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </div>

<h4 class="text-center">المنتجات</h4>
   <div class="row" style="padding: 65px;margin: 0px;">

       @foreach($products as $product)
           <div class="col-lg-2 col-md-3 col-sm-4">
               <div class="card product-card" >
                   <span class="price">{{$product->price}} EGP</span>
                   <a href="{{route('product',$product->id)}}">
                   <img class="card-img-top prod-img" src="{{asset('storage/'.$product->img)}}" alt="Card image cap">
                   <div class="card-body">
                       <h5 class="card-title">{{$product->name}}</h5>
                       <p class="card-text">{{$product->description}}</p>
                       <div class="row">
                           <div class="col-md-6"> <a  href="{{route('order',$product->id)}}" class="btn btn-primary btn-sm btn-block">طلب</a></div>
                           <div class="col-md-6"> <a  href="{{route('add_to_cart',$product->id)}}" class="btn btn-light btn-sm btn-block"> العربة</a></div>
                       </div>

                   </div>
                   </a>
               </div>
           </div>
       @endforeach


   </div>
<div style=" margin: 0 auto; width: 100%; max-width: fit-content; ">
    {{ $products->links("pagination::bootstrap-4") }}
</div>

@endsection


@section('pagescripts')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


@endsection
