<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
       body {
            background: url('<?= base_url(); ?>public/assets/bg_login.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.3); /* Semi-transparent white */
            backdrop-filter: blur(10px); /* Blur effect */
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeIn 0.8s ease-in-out;
            color: #333;
        }

        .card-header {
            background: rgba(10, 42, 64, 0.8); /* Semi-transparent header */
            color: #fff;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            padding: 20px;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .card-body {
            background: transparent;
            padding: 30px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 12px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #00bcd4;
            box-shadow: 0 0 8px rgba(0, 188, 212, 0.5);
            outline: none;
        }

        .btn-primary {
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            background: #0a2a40;
            border: none;
            width: 100%;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background: #008c9e;
        }

        a {
            color: #00bcd4;
            font-weight: 500;
            text-decoration: none;
        }

        a:hover {
            color: #008c9e;
            text-decoration: underline;
        }

        .invalid-feedback {
            display: block;
            color: #e74c3c;
        }

        .show-password {
            font-size: 1.5rem;
            color: #6c757d;
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
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
                        Register
                    </div>
                    <?php include APP_DIR.'views/templates/nav_auth.php';?>
                    <div class="card-body">
                        <?php flash_alert(); ?>
                        <form id="regForm" method="POST" action="<?=site_url('auth/register');?>">
                            <?php csrf_field(); ?>

                            <!-- Username Field -->
                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input id="username" type="text" class="form-control" name="username" required minlength="5" maxlength="20">
                            </div>

                            <!-- Email Field -->
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>

                            <!-- Password Field -->
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control" name="password" required minlength="8">
                                    <span class="show-password" id="toggle-password">👁️</span>
                                </div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required minlength="8">
                                    <span class="show-password" id="toggle-password-confirm">👁️</span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(function() {
            $('#toggle-password').on('click', function() {
                const passwordField = $('#password');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
            });

            $('#toggle-password-confirm').on('click', function() {
                const passwordConfirmField = $('#password_confirmation');
                const type = passwordConfirmField.attr('type') === 'password' ? 'text' : 'password';
                passwordConfirmField.attr('type', type);
            });
        });
    </script>

</body>
</html>
