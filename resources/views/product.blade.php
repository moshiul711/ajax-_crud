<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AJAX CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2 class="my-5 text-center">Laravel Ajax Crud</h2>
            <a href="" class="my-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>
            <div class="table-data">
                <table class="table table-bordered" id="myTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="" class="btn btn-success btn-sm update_product_form"
                               data-bs-toggle="modal"
                               data-bs-target="#updateModal"
                               data-id = "{{ $product->id }}"
                               data-name = "{{ $product->name }}"
                               data-price = "{{ $product->price }}"
                            >
                                <i class="las la-edit"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-sm delete_product" data-id = "{{ $product->id }}">
                                <i class="las la-times"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('product_js')
@include('add_product_modal')
@include('update_product_modal')

</body>
</html>