<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        ::-webkit-scrollbar {
            width: 8px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #6c7293;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #6c7293;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

        <div class="main-panel ">
            <div class="content-wrapper">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>

                @endif
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Product Table</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product Title</th>
                                                <th>Product Description</th>
                                                <th>Product Price</th>
                                                <th>Product Discount Price</th>
                                                <th>Product Quantity</th>
                                                <th>Product Category</th>
                                                <th>Product Image</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->title}}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($product->description, 100, '...')
                                                    }}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->discount_price}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td>{{$product->category}}</td>
                                                <td><img src="{{asset('products/'.$product->image)}}" alt="image"></td>
                                                <td>
                                                    <a onclick="return confirm('Are you sure you want to delete this category?')"
                                                        href="{{url('delete_product' , $product->id)}}">Delete</a>
                                                </td>
                                                <td>
                                                    <a href="{{url('update_product' , $product->id)}}">Update</a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.scripts')