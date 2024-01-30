<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function () {
        // Insert Product Data
        $(document).on('click','.add_product_btn', function (e) {
            e.preventDefault();

            let name = $('#name').val();
            let price = $('#price').val();

            $.ajax({
                url : "{{ route('add.product') }}",
                method: "post",
                data: { name:name, price:price },
                success: function (res) {
                    if (res.status == 'Product Add Successfully')
                    {
                        $('#addModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href+' #myTable');
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (key,value) {
                        $('.errorMsg').append('<span class="text-danger">'+ value+'</span>'+'<br>');
                    });
                },
            });
        });

        // Show product value in update form
        $(document).on('click','.update_product_form',function (e) {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
        });

        // Update product
        $(document).on('click','.update_product_btn', function (e) {
            e.preventDefault();
            let id = $('#up_id').val();
            let name = $('#up_name').val();
            let price = $('#up_price').val();

            $.ajax({
                url : "{{ route('update.product') }}",
                method: "post",
                data: { id:id, name:name, price:price },
                success: function (res) {
                    if (res.status == 'Product Updated Successfully')
                    {
                        $('#updateModal').modal('hide');
                        $('#updateProductForm')[0].reset();
                        $('.table').load(location.href+' #myTable');
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (key,value) {
                        $('.errorMsg').append('<span class="text-danger">'+ value+'</span>'+'<br>');
                    });
                },
            });
        });

        // Delete Product
        $(document).on('click','.delete_product',function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            if (confirm('Are you sure to delete this?'))
            {
                $.ajax({
                    url: "{{ route('delete.product') }}",
                    method: "get",
                    data: { id:id },
                    success: function (res) {
                        // console.log(res);
                        if (res.status == 'Product Deleted Successfully')
                        {
                            $('.table').load(location.href+' #myTable')
                        }
                    }
                });
            }
        });
    });
</script>