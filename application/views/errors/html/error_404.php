<!DOCTYPE html>
<html lang="en">

<head>


    <!-- Poppins Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">


    <!-- Start GA -->



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
        /* Maksimum lebar container */
        width: 100%;
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
        padding: 40px;
        /* Menambah padding untuk memperbesar ukuran card */
        margin-top: 20px;
        /* Menambah margin atas */
    }

    .card img {
        width: 100%;
        max-height: 200px;
        object-fit: cover;
        animation: zoom in 4s linear infinite;
    }

    h1 {
        color: #e74c3c;
        font-size: 48px;
        /* Menambah ukuran font h1 */
        margin: 0;
        margin-top: 20px;
    }

    /* Menambahkan ke dalam tag <style> di dalam <head> HTML Anda */

    h2 {
        font-size: 36px;
        /* Sesuaikan dengan ukuran yang diinginkan */
    }

    h4 {
        font-size: 24px;
        /* Sesuaikan dengan ukuran yang diinginkan */
    }

    p {
        font-size: 16px;
        /* Sesuaikan dengan ukuran yang diinginkan */
    }

    .page-description {
        color: #333;
        font-size: 20px;
        /* Menambah ukuran font page-description */
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
        /* Menambah ukuran font input */
    }

    .btn-primary {
        border-radius: 0;
        font-size: 18px;
        /* Menambah ukuran font button */
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

    /* Menambahkan ke dalam tag <style> di dalam <head> HTML Anda */

    .button-primary {
        background-color: #FFA500;
        /* Warna orange */
        color: #fff;
        /* Warna teks putih */
        padding: 10px 20px;
        /* Padding pada tombol */
        border: none;
        /* Menghilangkan border */
        border-radius: 5px;
        /* Sudut border yang melengkung */
        cursor: pointer;
        /* Kursor berubah menjadi tangan saat diarahkan ke tombol */
        text-align: center;
        /* Teks berada di tengah tombol */
        text-decoration: none;
        /* Menghilangkan dekorasi teks */
        display: inline-block;
        /* Mengubah tata letak menjadi inline block */
        font-size: 16px;
        /* Ukuran font teks */
    }

    /* Style tambahan saat tombol dihover */
    .button-primary:hover {
        background-color: #FF8C00;
        /* Warna orange yang lebih gelap saat tombol dihover */
    }
    </style>


</head>

<body>
    <div id="container">
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="card">
                        <img class="error-image" src="../assets/img/error.jpg" alt="Error Image">
                        <!-- <h1>404</h1> -->
                        <div class="page-description">
                            <h4><?php echo $message?></h4>
                            <p></p>
                        </div>
                        <div class="page-description">
                            <button href="#" class="button-primary">Kembali Ke
                                Dashboard</button>
                        </div>

                        <div class="simple-footer mt-5">
                            Copyright &copy; STIKES BOGOR HUSADA 2024
                        </div>
                    </div>
            </section>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</body>

</html>