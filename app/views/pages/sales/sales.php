<?php
include APP_DIR . 'views/templates/header.php'; // Include header.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
    /* General body styling */
    body {
        background: linear-gradient(to right, #e0e0e0, #ffffff);
        /* Dark gray to white */
        font-family: 'Poppins', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h2 {
        color: #002244;
        /* Dark navy blue */
        font-weight: 600;
        text-align: center;
        margin-bottom: 20px;
    }

    .card {
        border: none;
        border-radius: 16px;
        background: #ffffff;
        /* White for card background */
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        padding: 20px;
        color: #333;
        /* Dark gray text */
    }

    .card-title {
        font-weight: bold;
        color: #002244;
        /* Dark navy blue for titles */
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1rem;
        color: #555555;
        /* Medium gray for descriptions */
    }

    /* Modify Add to Cart Button */
    .add-to-cart {
        background: #333333; /* Solid dark gray */
        color: #ffffff; /* White text */
        border-radius: 25px;
        padding: 10px 20px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease-in-out;
    }

    .add-to-cart:hover {
        background: #2c2c2c; /* Slightly darker gray on hover */
        transform: scale(1.05);
    }

    .list-group-item {
        background: #d6d6d6;
        /* Light dark gray for cart items */
        border: none;
        border-radius: 12px;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        transition: all 0.2s ease-in-out;
    }

    .list-group-item:hover {
        background: #bdbdbd;
        /* Slightly darker gray on hover */
    }

    .list-group-item i {
        color: #002244;
        /* Dark navy blue for icons */
        cursor: pointer;
    }

    #total-amount {
        font-size: 1.4rem;
        font-weight: bold;
        color: #002244;
        /* Dark navy blue for total */
    }

    /* Modify Checkout Button */
    .btn-success {
        background-color: #dc3545; /* Red background */
        color: white; /* White text */
        font-weight: bold;
        padding: 12px;
        border-radius: 30px;
        transition: all 0.3s ease-in-out;
    }

    .btn-success:hover {
        background-color: #c82333; /* Darker red on hover */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<body class="bg-light">

    <main class="mt-3 pt-3">
        <div class="container">
            <!-- Sales Header -->
            <h2 class="fw-bold text-center mb-4">Point of Sale</h2>

            <!-- Search Bar -->
            <div class="row justify-content-center mb-3">
                <div class="col-lg-6 col-md-8">
                    <input type="text" id="search-bar" class="form-control shadow-sm" placeholder="Search for products..." aria-label="Search">
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Product Section -->
                <div class="col-lg-8 col-md-10 mb-4">
                    <div class="card shadow-lg border-0 rounded-3 overflow-auto" style="height: 60vh;">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-dark mb-3">Products</h4>
                            <div class="row" id="product-list">
                                <?php foreach ($products as $product): ?>
                                    <div class="col-lg-4 col-md-6 mb-3 product-card" data-name="<?= strtolower($product['name']); ?>">
                                        <div class="card border-0 rounded-3 shadow-sm fade-in">
                                            <div class="card-body text-center">
                                                <i class="fas fa-box-open fa-3x mb-3" style="color: #0288d1;"></i>
                                                <h5 class="card-title product-name"><?= $product['name']; ?></h5>
                                                <p class="card-text">₱<?= number_format($product['price'], 2); ?></p>
                                                <p class="card-text" id="stock-<?= $product['id']; ?>">
                                                    <i class="fas fa-cubes"></i> Stock: <?= $product['stock']; ?>
                                                </p>
                                                <button class="add-to-cart" data-product-id="<?= $product['id']; ?>" data-price="<?= $product['price']; ?>" data-name="<?= $product['name']; ?>" data-stock="<?= $product['stock']; ?>">
                                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg border-0 rounded-3 fade-in">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-dark mb-3">Your Cart</h4>
                            <!-- Added max-height and overflow to ul element -->
                            <ul class="list-group" id="cart-items" style="max-height: 300px; overflow-y: auto;">
                                <!-- Cart items will be displayed here dynamically -->
                            </ul>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h5 class="fw-bold">Total:</h5>
                                <p id="total-amount">$0.00</p>
                            </div>
                            <button class="btn btn-success w-100 animate__animated animate__pulse">Checkout</button>
                            <form id="checkout-form" action="/sales/checkout" method="POST">
                                <input type="hidden" id="product_ids" name="product_ids">
                                <input type="hidden" id="quantities" name="quantities">
                                <input type="hidden" id="total_prices" name="total_prices">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout Confirmation Modal -->
        <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="checkoutModalLabel">Confirm Checkout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to proceed with the checkout?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" id="confirmCheckout">Proceed with Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        let cart = [];

        $(document).on('click', '.add-to-cart', function () {
            const productId = $(this).data('product-id');
            const productPrice = parseFloat($(this).data('price'));
            const productName = $(this).data('name');
            let productStock = parseInt($(this).data('stock'));

            if (productStock <= 0) {
                alert('Sorry, this product is out of stock.');
                return;
            }

            productStock -= 1;
            $(this).data('stock', productStock);
            $('#stock-' + productId).text('Stock: ' + productStock).addClass('update-stock');

            // Check if product already exists in cart
            const existingProductIndex = cart.findIndex(item => item.id === productId);

            if (existingProductIndex > -1) {
                // Increment quantity if product already exists in the cart
                cart[existingProductIndex].quantity += 1;
            } else {
                // Add new product to cart
                cart.push({ id: productId, name: productName, price: productPrice, quantity: 1 });
            }

            updateCart();
        });

        function updateCart() {
            $('#cart-items').empty().addClass('fade-in');
            let total = 0;

            cart.forEach(item => {
                total += item.price * item.quantity; // Multiply price by quantity

                $('#cart-items').append(`
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        ${item.name} - ₱${item.price.toFixed(2)} x ${item.quantity}
                        <button class="btn btn-sm btn-danger remove-item" data-product-id="${item.id}">
                            <i class="fas fa-trash-alt"></i> Remove
                        </button>
                    </li>
                `);
            });

            $('#total-amount').text(`₱${total.toFixed(2)}`);
        }

        $(document).on('click', '.remove-item', function () {
            const productId = $(this).data('product-id');
            cart = cart.filter(item => item.id !== productId);
            updateCart();
        });

        // Checkout button click handler
        $(document).on('click', '.btn-success', function () {
            if (cart.length === 0) {
                alert('Your cart is empty! Please add items before checking out.');
                return;
            }

            // Show the confirmation modal
            $('#checkoutModal').modal('show');
        });

        $(document).ready(function() {
            // Search functionality
            $('#search-bar').on('keyup', function() {
                let searchTerm = $(this).val().toLowerCase(); // Get the search term and convert it to lowercase

                $('.product-card').each(function() {
                    const productName = $(this).data('name').toLowerCase(); // Get the product name and convert it to lowercase

                    // Check if the product name includes the search term
                    if (productName.includes(searchTerm)) {
                        $(this).show(); // Show product card if it matches
                    } else {
                        $(this).hide(); // Hide product card if it doesn't match
                    }
                });
            });
        });


        // When user confirms checkout
        $('#confirmCheckout').on('click', function () {
            // Collect cart data (product ID, quantity, and total price)
            const cartData = cart.map(item => ({
                product_id: item.id,
                quantity: item.quantity,
                total_price: item.price * item.quantity
            }));

            // Prepare data to be sent in hidden form fields
            $('#product_ids').val(cartData.map(item => item.product_id).join(','));
            $('#quantities').val(cartData.map(item => item.quantity).join(','));
            $('#total_prices').val(cartData.map(item => item.total_price).join(','));

            // Submit the form after confirmation
            $('#checkout-form').submit();

            // Close the modal after submitting
            $('#checkoutModal').modal('hide');
        });

        // When user cancels checkout, close the modal
        $('#checkoutModal').on('hidden.bs.modal', function () {
            alert('Checkout was canceled.');
        });
    </script>

</body>
</html>
