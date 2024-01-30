<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function () {
        $(document).on('click','.add_product_btn', function (e) {
            e.preventDefault();

            let name = $('#name').val();
            let price = $('#price').val();

            $.ajax({
                url : "{{ route('add.product') }}",
                method: "post",
                data: { name:name, price:price },
                success: function (res) {

                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (key,value) {
                        $('.errorMsg').append('<span class="text-danger">'+ value+'</span>'+'<br>');
                    })
                },
            });
        });
    });
</script>