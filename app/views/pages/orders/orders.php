<?php include APP_DIR . 'views/templates/header.php'; // Include header.php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            padding: 0;
            margin: 0;
        }

        h2 {
            color: #6c757d;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            animation: fadeIn 1s ease-out;
            background-color: #f8f9fa;
            height: 500px; /* Fixed height */
            overflow-y: auto; /* Enable scrolling */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            color: #6c757d;
            font-size: 1.5rem;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title i {
            color: #6c757d;
            font-size: 1.3rem;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            font-size: 1rem;
            border: 1px solid #ddd;
        }

        th {
            background-color: #6c757d;
            color: white;
        }

        tbody tr:hover {
            background-color: #e9ecef;
        }

        .empty-message {
            text-align: center;
            color: #6c757d;
            font-size: 1.2rem;
            margin-top: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <main class="mt-5 pt-5">
        <div class="container">
            <!-- Sales Header -->
            <h2 class="fw-bold text-center mb-4">Point of Sale <i class="fas fa-cash-register"></i></h2>

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 mb-4">
                    <div class="card shadow-lg border-0 rounded-3">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-dark mb-3">
                                Checkout <i class="fas fa-shopping-cart"></i>
                            </h4>

                            <?php if (!empty($sales)): ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
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
                                                <td>₱<?= number_format($sale['total_price'], 2); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p class="empty-message">No sales data available. Please add items to your cart.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
