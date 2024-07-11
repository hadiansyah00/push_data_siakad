<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Poppins Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            width: 100%;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 40px;
            margin-top: 20px;
        }

        .card img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            animation: zoom-in 4s linear infinite;
        }

        h1 {
            color: #e74c3c;
            font-size: 48px;
            margin: 0;
            margin-top: 20px;
        }

        h2 {
            font-size: 36px;
        }

        h4 {
            font-size: 24px;
        }

        p {
            font-size: 16px;
        }

        .page-description {
            color: #333;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .error-image {
            width: 100%;
        }

        .page-search form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .input-group {
            width: 100%;
        }

        .input-group-prepend,
        .input-group-append {
            width: 15%;
        }

        .form-control {
            border-radius: 0;
            font-size: 16px;
        }

        .btn-primary {
            border-radius: 0;
            font-size: 18px;
        }

        .simple-footer {
            text-align: center;
            margin-top: 30px;
            color: #888;
            font-size: 14px;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .button-primary {
            background-color: #FFA500;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .button-primary:hover {
            background-color: #FF8C00;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="card">
                        <img class="error-image" src="<?php echo base_url('assets/img/error.jpg'); ?>" alt="Error Image">
                        <div class="page-description">
                            <h4><?php echo $message; ?></h4>
                            <p></p>
                        </div>
                        <div class="page-description">
                            <a href="<?php echo base_url(); ?>" class="button-primary">Kembali Ke Dashboard</a>
                        </div>
                        <div class="simple-footer mt-5">
                            Copyright &copy; STIKES BOGOR HUSADA 2024
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo base_url('assets/modules/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/modules/popper.js'); ?>"></script>
    <script src="<?php echo base_url('assets/modules/tooltip.js'); ?>"></script>
    <script src="<?php echo base_url('assets/modules/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/modules/nicescroll/jquery.nicescroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/modules/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/stisla.js'); ?>"></script>

    <!-- Template JS File -->
    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
</body>

</html>
