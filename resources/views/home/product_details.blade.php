<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('home.styles')
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <!-- turn this into a product detail div   -->
    <div class="">
        <div class="">
            <div class="">
                <div class="">
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
                    <p>Product Descriptions: {{$product->category}}</p>
                    <p>Product Category: {{$product->description}}</p>
                    <p>Product Quantity: {{$product->quantity}}</p>


                </div>
            </div>
        </div>
    </div>





    @include('home.footer')
    @include('home.copyright')
    @include('home.scripts')
</body>

</html>