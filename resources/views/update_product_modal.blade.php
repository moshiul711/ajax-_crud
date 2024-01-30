
<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateProductForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">Update Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errorMsg"></div>

                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="up_name" class="form-control" placeholder="Product Name">
                        <input type="hidden" id="up_id">
                    </div>
                    <div class="form-group mt-2">
                        <label for="price">Product Price</label>
                        <input type="number" name="price" id="up_price" class="form-control" placeholder="Product Price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success update_product_btn">Update Product</button>
                </div>
            </div>
        </div>
    </form>
</div>