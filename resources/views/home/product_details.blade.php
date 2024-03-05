<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('home.styles')
</head>

<body>
    @include('home.header')

    <!-- turn this into a product detail div   -->
    <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding:30px">
        <div class="box">
            <div class="img-box" style="padding:20px">
                <img src="images/p1.png" alt="">
            </div>
            <div class="detail-box">
                <h5>
                    {{$product->title}}
                </h5>
                @if($product->discount_price != null)
                <h6 style="color:red">
                    Discount Price
                    <br>
                    {{$product->discount_price}}
                </h6>
                <h6 style=" text-decoration:line-through ;color:blue">
                    Price
                    <br>
                    ${{$product->price}}
                </h6>
                @else
                <h6 style="color:blue">
                    Price
                    <br>
                    ${{$product->price}}
                </h6>
                @endif
                <p>Product Category: {{$product->category}}</p>
                <p>Product Descriptions: {{$product->description}}</p>

                <a href="" class="btn btn-primary">Add to Cart</a>


            </div>
        </div>
    </div>




    @include('home.footer')
    @include('home.copyright')
    @include('home.scripts')
</body>

</html>