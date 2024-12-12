<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales & Inventory</title>
    <!-- Add Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add any additional CSS files -->
     <style>
      .db-body {
            position: relative; /* Establish a containing context */
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .db-body::before {
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            filter: blur(2px); /* Adjust the blur intensity */
            z-index: -1; /* Place it behind other content */
        }

        .db-body * {
            position: relative; /* Ensure all content is above the blurred background */
        }

     </style>
</head>

<body class="bg-light" style="">

    <!-- Sidebar and content layout -->
    <div class="d-flex" style="min-height: 100vh;">
        <!-- Sidebar -->
        <?php include APP_DIR . 'views/templates/sidebar.php'; ?>

        <!-- Main content -->
        <div class="flex-fill db-body">
            <!-- Header -->
            <?php include APP_DIR . 'views/templates/topbar.php'; ?>

            <!-- Main content area -->
            <div class="container-fluid p-2" style="max-height: 100vh; overflow-y: auto;">
                <?php include APP_DIR . 'views/pages/dashboard/dashboard.php'; ?>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>