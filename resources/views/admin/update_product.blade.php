<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')
    <style>
    .form-control {
        color: black;
        font-weight: bold;
    }
    </style>

</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>
                @endif

                @if($errors->any('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ $errors->first() }}
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Product</h4>
                                <form class="forms-sample" action="{{url('/update_product_api' , $product->id)}}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group m-2">
                                        <label class="m-2">Product Title</label>
                                        <input type="text" class="form-control" value="{{$product->title}}"
                                            placeholder="Product Title" name="title">

                                        <label class="m-2">Product Description</label>
                                        <input type="text" class="form-control" required
                                            placeholder="Product Description" name="description"
                                            value="{{$product->description}}">

                                        <label class=" m-2">Product Price</label>
                                        <input type="text" class="form-control" required placeholder="Product Price"
                                            name="price" value="{{$product->price}}">

                                        <label class="m-2">Product Discount Price</label>
                                        <input type="text" class="form-control" required
                                            placeholder="Product Discount Price" name="discount_price"
                                            value="{{$product->discount_price}}">

                                        <label class="m-2">Product Quantity</label>
                                        <input type="text" class="form-control" required placeholder="Product Quantity"
                                            name="quantity" value="{{$product->quantity}}">

                                        <label class="m-2">Product Category</label>
                                        <select class="form-control" name="category" required>
                                            <option value="{{$product->category}}" selected="">{{$product->category}}
                                            </option>
                                            @foreach($category as $cat)
                                            <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                                            @endforeach
                                        </select>
                                        <label class=" m-2">Current Product Image</label>
                                        <img src="{{$product->image}}" alt="Current Product Image" class="img-fluid">

                                        <label class=" m-2">Change Product Image</label>
                                        <input type="file" class="form-control" placeholder="Product Image"
                                            name="image">
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2"
                                        value="Add Product">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        @include('admin.scripts')
</body>

</html>