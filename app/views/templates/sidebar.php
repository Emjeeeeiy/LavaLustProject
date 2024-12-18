<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Icons</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #222;">

<div class="card" style="width: 250px; height: 95vh; background-color: #333333; border: none; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <aside class="p-4">
        <h4 class="mb-4 text-center" 
            style="color: #000; font-family: 'Poppins', sans-serif; font-size: 2rem; font-weight: 700; letter-spacing: 1px; 
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2); -webkit-text-stroke: 1px #00FFFF;">
            TrackFlow
        </h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="/index.php/dashboard" class="nav-link py-2">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="/index.php/products" class="nav-link py-2">
                    <i class="fas fa-box-open me-2"></i> Products
                </a>
            </li>
            <li class="nav-item">
                <a href="/index.php/sales" class="nav-link py-2">
                    <i class="fas fa-chart-line me-2"></i> Sales
                </a>
            </li>
            <li class="nav-item">
                <a href="/index.php/orders" class="nav-link py-2">
                    <i class="fas fa-shopping-cart me-2"></i> Orders
                </a>
            </li>
            <!-- Stylish Logout Button -->
            <a href="#" 
                data-bs-toggle="modal" 
                data-bs-target="#logoutModal"
                class="text-white fw-bold px-3 py-2 rounded shadow-sm d-block text-center" 
                style="text-decoration: none; font-family: 'Poppins', sans-serif; font-size: 1rem; background-color: #dc3545; transition: all 0.3s ease;">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a>
        </ul>
    </aside>
</div>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<style>
    .nav-link {
        font-family: 'Poppins', sans-serif; /* Modern font */
        font-weight: 600; /* Slightly bold */
        color: #fff !important; /* White text */
        text-decoration: none;
        letter-spacing: 0.5px; /* Subtle spacing */
        transition: all 0.3s ease-in-out; /* Smooth transition */
        opacity: 0.8; /* Initial opacity */
        padding: 8px 10px; /* Padding for better spacing */
    }

    .nav-link:hover {
        background-color: #555555; /* Slightly lighter gray on hover */
        border-radius: 8px; /* Rounded corners */
        color: #fff !important; /* Keep text white on hover */
        transform: translateX(5px); /* Slight slide effect */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15); /* Soft shadow */
        opacity: 1; /* Full visibility on hover */
    }

    .nav-item {
        margin-bottom: 10px; /* Spacing between items */
    }

    .card {
        margin: 10px; /* Add some outer spacing */
    }
</style>

</body>
</html>
