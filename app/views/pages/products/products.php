<?php include APP_DIR . 'views/templates/header.php'; // Include header.php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <main class="mt-3 pt-3">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col">
                    <h2 class="fw-bold">Products</h2>
                </div>
                <div class="col text-end">
                    <!-- Add Product Button triggers modal -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Add
                        Product</button>
                </div>
            </div>
        </div>

        <div class="container mb-4">
            <div class="row">
                <!-- Table Example -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <th scope="row"><?= $product['id'] ?></th>
                                <td><?= $product['name'] ?></td>
                                <td>$<?= $product['price'] ?></td>
                                <td><?= $product['stock'] ?></td>
                                <td>
                                    <!-- Edit Product Button triggers modal with product data -->
                                    <button class="btn btn-info edit-product" data-bs-toggle="modal"
                                        data-bs-target="#editProductModal" data-id="<?= $product['id'] ?>"
                                        data-name="<?= $product['name'] ?>" data-price="<?= $product['price'] ?>"
                                        data-stock="<?= $product['stock'] ?>">Edit</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for Adding Product -->
                    <form action="<?= site_url('products/addProduct') ?>" method="post">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="productPrice" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="productStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="productStock" name="stock" required>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for Editing Product -->
                    <form action="<?= site_url('products/editProduct') ?>" method="post">
                        <input type="hidden" name="id" id="editProductId">
                        <div class="mb-3">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="editProductPrice" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="editProductStock" name="stock" required>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        // Open the modal for editing product
        $(document).on('click', '.edit-product', function () {
            const productId = $(this).data('id');
            const productName = $(this).data('name');
            const productPrice = $(this).data('price');
            const productStock = $(this).data('stock');

            // Populate the modal with the product data for editing
            $('#editProductModalLabel').text('Edit Product');
            $('#editProductId').val(productId);
            $('#editProductName').val(productName);
            $('#editProductPrice').val(productPrice);
            $('#editProductStock').val(productStock);
        });
    </script>

</body>

</html>