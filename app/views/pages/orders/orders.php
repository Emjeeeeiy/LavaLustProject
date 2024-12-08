<?php include APP_DIR . 'views/templates/header.php'; // Include header.php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>    
    <div class="col-lg-8 col-md-10 mb-4">
        <div class="card shadow-lg border-0 rounded-3 overflow-auto" style="height: 60vh;">
            <div class="card-body">
                <h4 class="card-title fw-bold text-dark mb-3">checkout</h4>
                <div class="row" id="product-list">
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-4 col-md-6 mb-3 product-card">
                            <div class="card border-0 rounded-3 shadow-sm fade-in">
                                <div class="card-body text-center">
                                    <i class="fas fa-box-open fa-3x mb-3" style="color: #0288d1;"></i>
                                    <h5 class="card-title product-name"><?= $product['name']; ?></h5>
                                    <p class="card-text">₱<?= number_format($product['price'], 2); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>