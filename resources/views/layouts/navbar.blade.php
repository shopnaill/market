@php
$categories = \App\Models\Category::get();
$sub_cats   = \App\Models\SubCategory::get();
@endphp
<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
      <a class=" py-2" style="padding-top: .9rem!important;" href="/">
        Market
      </a>
        @foreach($categories as $cat)
            <li class="nav-item dropdown py-2 d-none d-md-inline-block">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$cat->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($sub_cats as $sub)
                        @if ($sub->cat_id == $cat->id)
                        <a class="dropdown-item" href="{{route('category',$sub->id)}}">{{$sub->name}}</a>
                        @endif
                    @endforeach
                </div>
            </li>
        @endforeach

        <a class="py-2 d-none d-md-inline-block" style="padding-top: 0.9rem !important;font-size: 23px;" href="{{route('cart')}}"><i class="fa fa-cart-plus"></i>  @if(session('cart')) <span class="cart-count">{{count(session('cart'))}}</span> @endif</a>
    </div>
  </nav>
