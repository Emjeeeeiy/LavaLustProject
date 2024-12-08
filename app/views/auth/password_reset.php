<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeIn 0.8s ease-in-out;
        }

        .card-header {
            background: #6c757d;
            color: #fff;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            padding: 20px;
        }

        .card-body {
            background: #ffffff;
            padding: 30px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 12px;
        }

        .btn-primary {
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            background: #343a40;
            border: none;
            width: 100%;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background: #495057;
        }

        .invalid-feedback, .valid-feedback {
            display: none;
            font-size: 0.875rem;
            color: #e74c3c;
        }

        .valid-feedback {
            color: #28a745;
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
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Reset Password
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?=site_url('auth/password-reset');?>">
                            <?php csrf_field(); ?>

                            <!-- Email Field -->
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control <?=$LAVA->session->flashdata('alert');?>" name="email" required>
                                <div class="invalid-feedback">
                                    We can't find a user with that email address.
                                </div>
                                <div class="valid-feedback">
                                    Reset password link was sent to your email.
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                            </div>
                            <?php include APP_DIR.'views/templates/nav_auth.php';?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Example script to handle showing feedback (this should be triggered by actual server response)
        $(document).ready(function() {
            let emailInput = $("#email");

            // Simulate validation for feedback
            if (emailInput.hasClass("is-invalid")) {
                $(".invalid-feedback").show();
            } else if (emailInput.hasClass("is-valid")) {
                $(".valid-feedback").show();
            }
        });
    </script>
</body>
</html>
