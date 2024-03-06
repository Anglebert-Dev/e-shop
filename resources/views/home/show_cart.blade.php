<!DOCTYPE html>
<html>

<head>
    @include('home.styles')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <div class="hero_areas">
        @include('home.header') 
    </div>
    <div>
        <div class="flex-grow flex justify-center items-center">
            <div class="container mx-auto">
                <div class="bg-white p-6 rounded shadow-md">
                    <h2 class="text-lg font-semibold mb-4 ">Your Products To Purchase</h2>
                    <hr class="border-gray-200">
                    <div class="grid grid-cols-1 gap-4">
                        @php
$totalPrice = 0;
                        @endphp
                        @foreach($cart as $item)
                            <div class="flex items-center border-b border-gray-200 py-12">
                                <img src="images/p1.png" alt="Product Image" class="w-16 h-16 rounded-full mr-4">
                                <div class="">
                                    <h3 class="font-semibold">{{$item->product_title}}</h3>
                                    <p class="text-gray-600">Quantity: <span>{{$item->quantity}}</span></p>
                                    <p class="text-gray-600">Price: ${{$item->price}}</p>
                                    <div class="mt-2">
                                        <button class="text-sm text-red-500 mr-2">Remove</button>
                                    </div>
                                </div>
                            </div>
                            @php
    $totalPrice += $item->price;
                            @endphp
                        @endforeach
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-lg font-semibold">Total: ${{$totalPrice}}</p>
                        <a href="" class="btn btn-primary ">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer mt-8">
        @include('home.footer')
    </div>

    @include('home.scripts')
</body>

</html>
