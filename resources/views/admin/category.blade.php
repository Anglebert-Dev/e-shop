<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>


                @endif
                @if($errors->any('error'))
                 <!-- turn this into tailwind classes  -->
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ $errors->first() }}
                </div>
                @endif
            
            

                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title
                                ">Add Category</h4>
                                <form class="forms-sample" action="{{url('/add_category')}}" method="POST">
                                    @csrf
                                    <div class="form-group
                                    ">
                                        <label for="exampleInputName1">Category Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Category Name" name="name">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <!-- <button class="btn btn-light">Cancel</button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- category tables -->
                <div class="row">
                    <div class="col-lg-12 mt-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title
                                ">Category List</h4>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Category Name
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <td>
                                                    {{$category->id}}
                                                </td>
                                                <td>
                                                    {{$category->category_name}}
                                                </td>
                                                <td>
                                                    <a 
                                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                                    href="{{url('delete_category' , $category->id)}}">Delete</a>
                                                    <!-- <a href="">Update</a> -->
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- container-scroller -->
                            <!-- plugins:js -->
                            @include('admin.scripts')
                            <!-- End custom js for this page -->
</body>

</html>