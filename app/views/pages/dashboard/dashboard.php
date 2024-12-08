<?php include APP_DIR . 'views/templates/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Recent Activity</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            color: #37474f;
            font-size: 1.5rem;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
            padding: 0.5rem;
            margin: 0.2rem;
            background: #fff;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }

        .icon {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .gray-card {
            background-color: #f0f0f0;
        }

        .chart-card {
            height: 350px;
        }
    </style>
</head>

<body>
    <main class="mt-4 pt-4">
        <!-- Header Section -->
        <div class="container" data-aos="fade-down">
            <h2 class="fw-bold">Recent Activity</h2>
        </div>

        <!-- Stats Section -->
        <div class="container" data-aos="fade-up">
            <div class="row g-3">
                <!-- Total Products Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card text-center gray-card">
                        <div class="card-body">
                            <i class="fas fa-box icon text-primary"></i>
                            <h4 class="card-title fw-bold"><?= $data['productCount'] ?></h4>
                            <p class="card-text">Total Products</p>
                        </div>
                    </div>
                </div>

                <!-- Total Sales Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card text-center gray-card">
                        <div class="card-body">
                            <i class="fas fa-dollar-sign icon text-warning"></i>
                            <h4 class="card-title fw-bold"><?= $data['productsSum'] ?></h4>
                            <p class="card-text">Total Sales</p>
                        </div>
                    </div>
                </div>

                <!-- New Items Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card text-center gray-card">
                        <div class="card-body">
                            <i class="fas fa-tags icon text-success"></i>
                            <h4 class="card-title fw-bold"><?= $data['stocksSum'] ?></h4>
                            <p class="card-text">Total Stocks</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="container mt-3" data-aos="zoom-in">
            <div class="row g-3">
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="card chart-card gray-card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sales</h5>
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-6 col-md-6">
                    <div class="card chart-card gray-card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sales Distribution</h5>
                            <canvas id="categoriesChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card chart-card gray-card">
                        <div class="card-body" >
                            <h5 class="card-title fw-bold">Product Distribution</h5>
                            <canvas id="distributionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        AOS.init();

        // Initialize Charts
        new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales ($)',
                    data: [1500, 1800, 1300, 2200, 2500, 3000, 3500],
                    borderColor: '#00796b',
                    backgroundColor: 'rgba(0, 150, 136, 0.2)',
                    borderWidth: 2
                }]
            }
        });

        const productNames = <?= $data['productNames'] ?>;
        const quantities = <?= $data['quantities'] ?>;

        // Initialize an object to store the summarized quantities for each unique product
        const summarizedQuantities = {};

        // Iterate through the product names and accumulate the quantities
        for (let i = 0; i < productNames.length; i++) {
            if (summarizedQuantities[productNames[i]]) {
                // If the product is already in the object, add the quantity to the existing one
                summarizedQuantities[productNames[i]] += quantities[i];
            } else {
                // If it's the first occurrence of the product, initialize the quantity
                summarizedQuantities[productNames[i]] = quantities[i];
            }
        }

        // Prepare the final arrays for the chart
        const uniqueProductNames = Object.keys(summarizedQuantities);
        const finalQuantities = Object.values(summarizedQuantities);

        // Now, use the unique product names and summarized quantities for the chart
        new Chart(document.getElementById('categoriesChart'), {
            type: 'doughnut',
            data: {
                labels: uniqueProductNames,
                datasets: [{
                    data: finalQuantities,
                    backgroundColor: ['#FF6384', '#4CAF50', '#FFCE56', '#673AB7'], // You can adjust this color array dynamically based on the number of items
                }]
            }
        });


        const productNames2 = <?= $data['productNames2'] ?>;
        const stocks = <?= $data['stocks'] ?>;

        new Chart(document.getElementById('distributionChart'), {
            type: 'bar',
            data: {
                labels: productNames2,  // Use product names for the chart labels
                datasets: [{
                    label: 'Stock Available',
                    data: stocks,  // Use stock quantities for the data
                    backgroundColor: '#4CAF50',  // Color for the bars
                }]
            }
        });

    </script>
</body>

</html>