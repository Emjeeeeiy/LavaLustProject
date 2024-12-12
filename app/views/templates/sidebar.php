<div class="card" style="width: 250px; height: 95vh; background-color: #333333; border: none; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <aside class="p-4">
        <h4 class="mb-4 text-center" 
            style="color: #000; font-family: 'Poppins', sans-serif; font-size: 2rem; font-weight: 700; letter-spacing: 1px; 
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2); -webkit-text-stroke: 1px #00FFFF;">
            TrackFlow
        </h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="/index.php/dashboard" class="nav-link py-2">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="/index.php/products" class="nav-link py-2">Products</a>
            </li>
            <li class="nav-item">
                <a href="/index.php/sales" class="nav-link py-2">Sales</a>
            </li>
            <li class="nav-item">
                <a href="/index.php/orders" class="nav-link py-2">Orders</a>
            </li>
            <!-- Stylish Logout Button -->
            <a href="<?= site_url('auth/logout'); ?>" 
            onclick="return confirm('Are you sure you want to log out?');"
            class="text-white fw-bold px-3 py-2 rounded shadow-sm" 
            style="text-decoration: none; font-family: 'Poppins', sans-serif; font-size: 1rem; background-color: #dc3545; transition: all 0.3s ease;">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a>

        </ul>
    </aside>
</div>

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
