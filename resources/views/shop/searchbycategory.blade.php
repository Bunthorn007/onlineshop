@extends('./layouts/shop/app')

@section('header')
    <title>shop store</title>
    <link rel="stylesheet" href="{{asset('css/store.min.css')}}">
@endsection

@section('content')

    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">Results</span>
        </h1>
    </div>
    <div class="store" id="load-data">

            <div class="row" id="remove-row">
                <div class="col-xs-12">
                    <ul class="products">
                        @foreach($products as $product)
                        <li class="product">
                            <div class="product-image">
                                <a class="overlay" href="{{url('/shop/product/'.$product->id)}}">
                                    <div class="overlay-image">
                                        <img class="img-responsive" src="{{asset($product->productImages->first()->file)}}">
                                    </div>
                                    <div class="overlay-content overlay-top">
                                        <span class="label label-success pull-right">SALE!</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <h5 class="product-name">
                                    <a class="link-muted" href="{{url('/shop/product/'.$product->id)}}">{{$product->name}}</a>
                                </h5>
                                <span class="product-rating">
                                    <span class="divider">
                                        <span class="divider-content">
                                            <span class="icon icon-star active"></span>
                                            <span class="icon icon-star active"></span>
                                            <span class="icon icon-star active"></span>
                                        </span>
                                    </span>
                                </span>
                                <span class="product-price">
                                    <span class="product-price-current"> $ {{$product->price}}</span>
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

    </div>

@endsection

@section('footer')

    <script>
        $(document).ready(function(){
            $(document).on('click','#btn-more',function(){
                var id = $(this).data('id');
                $("#btn-more").html("Loading....");
                $.ajax({
                    url : '{{ url("/loadsearchdata") }}',
                    method : "POST",
                    data : {
                        id:id,
                        'name': $('input[name=name]').val(),
                        _token:"{{csrf_token()}}"
                    },
                    dataType : "text",
                    success : function (data)
                    {
                        if(data != '')
                        {
                            $('#remove-row').remove();
                            $('#load-data').append(data);
                            $('#btn-more').html("Search");
                        }
                        else
                        {
                            $('#btn-more').html("No Data");
                        }
                    }
                });
            });
        });
    </script>

@endsection
