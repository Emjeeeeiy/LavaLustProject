<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>  
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <link href="<?=base_url();?>public/css/main.css" rel="stylesheet">
    <link href="<?=base_url();?>public/css/style.css" rel="stylesheet">

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
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            overflow: hidden;
            backdrop-filter: blur(10px); /* Adds a blur effect to the background */
            animation: fadeIn 0.8s ease-in-out;
            color: #333;
        }

        .card-header {
            background: #0a2a40;
            color: white;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            padding: 20px;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .card-body {
            background: transparent; /* Ensures the blur applies properly */
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
            font-size: 1.1rem;
            font-weight: 600;
            background: #00bcd4;
            border: none;
            width: 100%;
            color: white;
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
            font-weight: 500;
        }

        .input-group {
            position: relative;
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
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <?php include APP_DIR.'views/templates/nav_auth.php';?> 
                    <div class="card-body">
                        <?php flash_alert(); ?>
                        <form id="logForm" method="POST" action="<?=site_url('auth/login');?>">
                            <?php csrf_field(); ?>

                            <!-- Email Field -->
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control <?=$LAVA->session->flashdata('is_invalid');?>" 
                                    name="email" required autocomplete="email" autofocus>
                                <span class="invalid-feedback">
                                    <strong><?php echo $LAVA->session->flashdata('err_message'); ?></strong>
                                </span>
                            </div>

                            <!-- Password Field with Eye Emoji Inside -->
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control" name="password" minlength="8" required autocomplete="current-password">
                                    <span class="show-password" id="toggle-password">👁️</span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>

                            <!-- Forgot Password -->
                            <div class="text-center mt-3">
                                <a href="<?=site_url('auth/password-reset');?>" style="color: #000">Forgot Your Password?</a>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <script>
        $(function() {
            var logForm = $("#logForm");
            if(logForm.length) {
                logForm.validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 8
                        }
                    },
                    messages: {
                        email: {
                            required: "Please enter your email address.",
                            email: "Please enter a valid email address."
                        },
                        password: {
                            required: "Please enter your password.",
                            minlength: "Your password must be at least 8 characters long."
                        }
                    }
                });
            }

            // Toggle password visibility with eye emoji inside the field
            $('#toggle-password').on('click', function() {
                const passwordField = $('#password');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
            });
        });
    </script>

</body>
</html>
