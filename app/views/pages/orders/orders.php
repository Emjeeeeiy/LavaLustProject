<?php include APP_DIR . 'views/templates/header.php'; // Include header.php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <main class="mt-3 pt-3">
        <div class="container">
            <!-- Sales Header -->
            <h2 class="fw-bold text-center mb-4">Point of Sale</h2>

            <!-- Search Bar -->
            <div class="row justify-content-center mb-3">
                <div class="col-lg-6 col-md-8">
                    <input type="text" id="search-bar" class="form-control shadow-sm"
                        placeholder="Search for products..." aria-label="Search">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 mb-4">
                    <div class="card shadow-lg border-0 rounded-3 overflow-auto" style="height: 60vh;">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-dark mb-3">Checkout</h4>

                            <?php if (!empty($sales)): ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product ID</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sales as $sale): ?>
                                            <tr>
                                                <td><?= $sale['id']; ?></td>
                                                <td><?= $sale['product_name']; ?></td>
                                                <td><?= $sale['quantity']; ?></td>
                                                <td><?= number_format($sale['total_price'], 2); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p>No sales data available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>