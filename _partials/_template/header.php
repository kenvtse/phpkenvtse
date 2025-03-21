<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenvtse - <?php echo ucfirst($page ?? 'Home'); ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/myproject/css/style.css?v=<?php echo time(); ?>">

    <!-- jQuery & Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #080808;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(45deg, #000, #0a0a0a);
            border-bottom: 4px solid #FFA500;
            box-shadow: 0 0 10px #FFA500;
        }

        .navbar-brand h1 {
            font-family: 'Orbitron', sans-serif;
            color: #FFD700;
            text-shadow: 0 0 10px #FFD700, 0 0 20px #FFA500;
        }

        .nav-link {
            font-size: 20px;
            font-weight: bold;
            color: white;
            transition: 0.3s ease-in-out;
            text-shadow: 0 0 10px #FFA500;
        }

        .nav-link:hover {
            color: #FFD700;
            text-shadow: 0 0 15px #FF4500;
        }

        /* Neon Login Button */
        .login-button {
            padding: 10px 20px;
            border-radius: 25px;
            border: none;
            background: linear-gradient(45deg, #FFD700, #FFA500);
            color: black;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 0 15px #FFA500;
        }

        .login-button:hover {
            background: linear-gradient(45deg, #FF4500, #FFD700);
            box-shadow: 0 0 25px #FF4500;
        }

        /* Profile Image */
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #FFD700;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="index.php?page=home">
                <h1 class="mb-0"><i class="bi bi-fingerprint text-warning"></i><b> Kenvtse</b></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
                <ul class="navbar-nav me-3 my-2 my-lg-0 navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=home">🏠 Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">💰 Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">🤖 AI Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            📜 Documentation
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">API Integrations</a></li>
                            <li><a class="dropdown-item" href="#">Embedded AI Chatbots</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Cloud Datasets</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <form method="post">
                            <button class="login-button" type="submit" name="login">🔐 Login</button>
                        </form>
                        <?php
                        if (isset($_POST['login'])) {
                            echo "<script>window.location.href = 'index.php?page=login';</script>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>
</html>
