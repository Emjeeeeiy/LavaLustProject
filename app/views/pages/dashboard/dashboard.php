<?php
include APP_DIR . 'views/templates/header.php';

// Example data fetching (replace with actual data fetching from your database)
$productCount = 100;  // This should be fetched from your database
$salesCount = 1500;   // Replace with actual sales data
$newItemCount = 25;   // Replace with actual new items count
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Activity</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
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

        .chart-card {
            height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .chart-card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        canvas {
            max-height: 250px;
            width: 100%;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1rem;
            margin-bottom: 0.3rem;
        }

        .icon {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #00796b;
        }

        .card-text {
            font-size: 0.8rem;
        }

        .btn-primary {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }

        .card-body {
            padding: 0.6rem;
        }

        .gray-card {
            background-color: #f0f0f0;
            color: #333;
        }

        .gray-card .card-body {
            background-color: #e0e0e0;
        }

        .gray-card .icon {
            color: #607d8b;
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
            <div class="row g-2">
                <!-- Total Products Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card text-center gray-card">
                        <div class="card-body">
                            <i class="fas fa-box icon" style="color: #2196F3;"></i>
                            <h4 class="card-title fw-bold"><?= $productCount ?></h4>
                            <p class="card-text mb-1">Total Products</p>
                        </div>
                    </div>
                </div>

                <!-- Total Sales Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card text-center gray-card">
                        <div class="card-body">
                            <i class="fas fa-dollar-sign icon" style="color: orange;"></i>
                            <h4 class="card-title fw-bold"><?= $salesCount?></h4>
                            <p class="card-text mb-1">Total Sales</p>
                        </div>
                    </div>
                </div>

                <!-- New Items Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card text-center gray-card">
                        <div class="card-body">
                            <i class="fas fa-tags icon" style="color: #4CAF50;"></i>
                            <h4 class="card-title fw-bold"><?= $newItemCount ?></h4>
                            <p class="card-text mb-1">New Items</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="container mt-3" data-aos="zoom-in">
            <div class="row g-3">
                <div class="d-flex flex-wrap justify-content-between">
                    <!-- Sales Chart -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card p-2 chart-card gray-card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2">Sales</h5>
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Top Categories Chart -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card p-2 chart-card gray-card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2">Top Categories</h5>
                                <canvas id="categoriesChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Product Distribution Chart -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card p-2 chart-card gray-card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2">Product Distribution</h5>
                                <canvas id="cellphoneDistributionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        AOS.init();

        // Sales Chart Data
        const salesData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Sales ($)',
                data: [1500, 1800, 1300, 2200, 2500, 3000, 3500],
                borderColor: 'rgba(0, 150, 136, 1)',
                backgroundColor: 'rgba(0, 150, 136, 0.2)',
                borderWidth: 2
            }]
        };

        new Chart(document.getElementById('salesChart').getContext('2d'), {
            type: 'line',
            data: salesData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Sales Performance Over Time'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Categories Chart Data
        const categoriesData = {
            labels: ['Category A', 'Category B', 'Category C', 'Category D'],
            datasets: [{
                data: [30, 25, 20, 25],
                backgroundColor: ['#FF6384', '#4CAF50', '#FFCE56', '#673AB7']
            }]
        };

        new Chart(document.getElementById('categoriesChart').getContext('2d'), {
            type: 'doughnut',
            data: categoriesData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });

        // Product Distribution Chart Data
        const cellphoneDistributionData = {
            labels: ['Android', 'iOS', 'Feature Phones'],
            datasets: [{
                label: 'Cellphone Distribution',
                data: [60, 30, 10],
                backgroundColor: ['#4CAF50', '#FF9800', '#2196F3'],
                borderColor: ['#388E3C', '#F57C00', '#1976D2'],
                borderWidth: 1
            }]
        };

        new Chart(document.getElementById('cellphoneDistributionChart').getContext('2d'), {
            type: 'bar',
            data: cellphoneDistributionData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        //text: 'Cellphone Distribution by Type'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
