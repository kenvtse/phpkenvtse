<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenvtse - <?php echo ucfirst($page ?? 'Home'); ?></title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/myproject/css/style.css?v=<?php echo time(); ?>">

    <!-- jQuery & Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <style>

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
        }
        .login-button {
            padding: 10px 20px;
            border-radius: 25px;
            border: none;
            background-color: #ffc107;
            color: #000;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-5 border-warning">
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
                        <a class="nav-link text-white" href="index.php?page=home" style="font-size: 20px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" style="font-size: 20px;">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" style="font-size: 20px;">AI Products offer</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="font-size: 20px;">
                            Documentation
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
                            <button class="login-button" type="submit" name="login">Login</button>
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
