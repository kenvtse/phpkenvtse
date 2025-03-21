<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Agar footer tetap di bawah */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Memastikan halaman minimal setinggi viewport */
        }
        .content {
            flex-grow: 1; /* Mengisi ruang kosong agar footer tetap di bawah */
        }
        footer {
            padding: 15px 0;
        }
    </style>
</head>
<body>

    <div class="container mt-4 flex-grow-1 content">
        <div class="p-5 text-dark d-flex align-items-center justify-content-center"
             style="border-top: 4px solid gold; 
                    border-right: 20px solid gold; 
                    border-top-right-radius: 40px;
                    border-radius: 0 0 50px 10px;">

            <!-- Text Content -->
            <div class="text-center">
                <h2 style="font-size:60px;"><b>Welcome, Administrator <?php echo $_SESSION['full_name'];?>!</b></h2>
                <p>This is the admin dashboard.</p>
                <br>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center mt-auto py-2">
        <div class="container">
            <p>&copy; <b> OUR SOCIAL MEDIA </b></p>
            <div>
                <a href="https://www.instagram.com" target="_blank" class="text-white mx-2">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
                <a href="https://www.facebook.com" target="_blank" class="text-white mx-2">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="https://twitter.com" target="_blank" class="text-white mx-2">
                    <i class="fab fa-twitter fa-2x"></i>
                </a>
            </div>
        </div>
    </footer>

</body>
</html>
