<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starvee Engine</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #080808;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        /* NEON HEADER */
        h1, h2 {
            font-family: 'Orbitron', sans-serif;
            text-shadow: 0 0 10px #FFD700, 0 0 20px #FFA500, 0 0 40px #FF4500;
            color: #FFD700;
        }

        /* NEON EFFECT FOR FEATURES */
        .neon-card {
            background-color: #121212;
            border: 2px solid #FFA500;
            color: white;
            box-shadow: 0 0 15px #FFA500;
            border-radius: 15px;
            transition: 0.3s;
        }

        .neon-card:hover {
            box-shadow: 0 0 25px #FF4500;
            transform: translateY(-5px);
        }

        /* ICON STYLING */
        .bi {
            text-shadow: 0 0 10px #FFD700, 0 0 20px #FFA500;
        }

        /* FOOTER */
        footer {
            background: linear-gradient(45deg, #0a0a0a, #111);
            padding: 20px 0;
            box-shadow: 0 0 20px #FFA500;
        }

        footer a {
            text-shadow: 0 0 10px #FFD700;
        }

        footer p {
            font-family: 'Orbitron', sans-serif;
            color: #FFD700;
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <div class="p-5 text-dark d-flex align-items-center position-relative"
             style="border-top: 4px solid gold; border-right: 20px solid gold; border-top-right-radius: 40px; border-radius: 0 0 50px 10px;">
            <div class="text-white">
                <h1><b>Starvee Engine Update v.3 (vee-3)</b></h1>
                <p class="text-muted">Gunakan Futuristik AI chatbot di lokal server kamu, Layanan Chatbot virtual yang bisa kamu gunakan untuk bisnis sehari-hari.</p>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mt-5">
        <h2 class="mb-3 text-center">🚀 Starvee High Capabilities</h2>
        <p class="text-center">Due to high request of AI, the next generation AI Chatbot has been created.</p>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            
            <!-- Feature 1 -->
            <div class="col">
                <div class="card p-3 neon-card text-center">
                    <i class="bi bi-robot text-primary fs-1"></i>
                    <h5 class="mt-3"><b>AI Chatbot</b></h5>
                    <p>Supercharged AI Chatbot to help developers optimize their code with ease.</p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col">
                <div class="card p-3 neon-card text-center">
                    <i class="bi bi-shield-lock text-danger fs-1"></i>
                    <h5 class="mt-3"><b>Security</b></h5>
                    <p>Advanced fraud detection to ensure data safety, no matter where you are.</p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col">
                <div class="card p-3 neon-card text-center">
                    <i class="bi bi-speedometer2 text-success fs-1"></i>
                    <h5 class="mt-3"><b>Fastest Response</b></h5>
                    <p>With a 0.2s response time, get real-time AI assistance without delay.</p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="col">
                <div class="card p-3 neon-card text-center">
                    <i class="bi bi-cloud-arrow-down text-warning fs-1"></i>
                    <h5 class="mt-3"><b>Cloud Options</b></h5>
                    <p>Collect and store datasets for reusable AI integration across multiple projects.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <div class="container">
            <p>&copy; 2025 <b>OUR SOCIAL MEDIA</b></p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
