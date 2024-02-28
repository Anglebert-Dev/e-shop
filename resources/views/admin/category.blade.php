<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            margin-top: 50px;
        }

        .div_center h2 {
            font-size: 30px;
            font-weight: 600;
            padding-bottom: 50px;
        }

        .input {
            color: #000;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(Session::has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ Session::get('message') }}
                </div>

                @endif
                @if($errors->any('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ $errors->first() }}
                </div>
                @endif
                <div class="div_center">
                    <h2>Add Category</h2>

                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <input class="input" type="text" name="name" placeholder="add category name">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                    </form>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.scripts')
        <!-- End custom js for this page -->
</body>

</html>