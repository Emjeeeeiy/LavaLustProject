<?php
include APP_DIR . 'views/templates/header.php'; // Include header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | Inventory and Sales Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f0f2f5; /* Light gray background */
        font-family: 'Poppins', sans-serif;
        overflow: hidden; /* Disable scrolling on the body */
    }

    .settings-container {
        max-width: 500px; /* Smaller width for better fit */
        margin: 40px auto;
        padding: 20px;
        background-color: #ffffff; /* White background for the container */
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow-y: auto; /* Allow scrolling within the form if necessary */
        height: 80vh; /* Set a fixed height */
        transition: transform 0.3s ease-in-out; /* Animation for scaling */
    }

    .settings-container:hover {
        transform: scale(1.05); /* Slight zoom-in effect */
    }

    .settings-header {
        font-size: 1.8rem;
        color: #00bcd4; /* Cyan color */
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }

    .form-label {
        font-weight: bold;
        color: #555;
    }

    .section-divider {
        margin: 30px 0;
        border-top: 2px dashed #ddd;
    }

    .btn-save {
        background-color: #00bcd4; /* Cyan button color */
        color: #fff;
        transition: background-color 0.3s ease; /* Animation for hover */
    }

    .btn-save:hover {
        background-color: #007c8c; /* Darker cyan when hovered */
    }

    .form-check-label {
        font-size: 0.9rem; /* Adjust font size of labels */
    }

    .form-control, .form-select {
        height: 40px; /* Adjust input field height */
    }

    .btn-save {
        width: 100%; /* Full width for the save button */
    }

    .form-control, .form-select {
        border-radius: 8px; /* Rounded corners for form elements */
        transition: border-color 0.3s ease; /* Smooth border transition */
    }

    .form-control:focus, .form-select:focus {
        border-color: #00bcd4; /* Cyan border on focus */
        box-shadow: 0 0 5px rgba(0, 188, 212, 0.5); /* Cyan glow effect */
    }

    .form-check-input:checked {
        background-color: #00bcd4; /* Cyan color for checked checkboxes */
        border-color: #00bcd4;
    }

    .form-check-input:focus {
        border-color: #00bcd4; /* Cyan border on focus */
    }

    .section-divider {
        margin: 30px 0;
        border-top: 2px dashed #00bcd4; /* Cyan divider line */
    }

    /* Animation for section content */
    .settings-container .mb-3 {
        opacity: 0;
        animation: fadeIn 1s ease-in-out forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .settings-container .mb-3:nth-child(1) {
        animation-delay: 0.2s;
    }
    .settings-container .mb-3:nth-child(2) {
        animation-delay: 0.4s;
    }
    .settings-container .mb-3:nth-child(3) {
        animation-delay: 0.6s;
    }
    .settings-container .mb-3:nth-child(4) {
        animation-delay: 0.8s;
    }

    .settings-container .mb-3:nth-child(5) {
        animation-delay: 1s;
    }
    </style>
</head>

<body>

    <div class="settings-container">
        <h2 class="settings-header">System Settings</h2>
        <form>
            <!-- General Settings -->
            <div class="mb-3">
                <label for="companyName" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="companyName" placeholder="Enter company name">
            </div>

            <div class="mb-3">
                <label for="currency" class="form-label">Default Currency</label>
                <select class="form-select" id="currency">
                    <option selected>Select currency</option>
                    <option value="USD">USD</option>
                    <option value="PHP">PHP</option>
                    <option value="EUR">EUR</option>
                </select>
            </div>

            <div class="section-divider"></div>

            <!-- Inventory Settings -->
            <h4 class="mb-3">Inventory Settings</h4>
            <div class="mb-3">
                <label for="lowStockThreshold" class="form-label">Low Stock Threshold</label>
                <input type="number" class="form-control" id="lowStockThreshold" placeholder="Enter threshold quantity">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="autoRestock">
                <label class="form-check-label" for="autoRestock">Enable Auto-Restock Alerts</label>
            </div>

            <div class="section-divider"></div>

            <!-- Sales Settings -->
            <h4 class="mb-3">Sales Settings</h4>
            <div class="mb-3">
                <label for="taxRate" class="form-label">Default Tax Rate (%)</label>
                <input type="number" class="form-control" id="taxRate" placeholder="Enter tax rate">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="invoiceGeneration">
                <label class="form-check-label" for="invoiceGeneration">Enable Automatic Invoice Generation</label>
            </div>

            <div class="section-divider"></div>

            <!-- Notification Settings -->
            <h4 class="mb-3">Notification Settings</h4>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="emailNotifications">
                <label class="form-check-label" for="emailNotifications">Enable Email Notifications</label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="smsNotifications">
                <label class="form-check-label" for="smsNotifications">Enable SMS Notifications</label>
            </div>

            <!-- Save Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-save px-4 py-2">Save Changes</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    