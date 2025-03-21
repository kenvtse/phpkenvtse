<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leonor AI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <style>
    .chat-container {
      display: flex;
      flex-direction: column;
      height: 70vh;
      border: 1px solid #ccc;
      border-radius: 10px;
      overflow: hidden;
      background-color: #fff;
    }
    .chat-header {
      background-color: #f8f9fa;
      padding: 10px;
      border-bottom: 1px solid #ccc;
      text-align: center;
      font-weight: bold;
    }
    .chat-messages {
      flex: 1;
      padding: 10px;
      overflow-y: auto;
      background-color: #f9f9f9;
    }
    .chat-input {
      display: flex;
      padding: 10px;
      background-color: #f8f9fa;
      border-top: 1px solid #ccc;
    }
    .chat-input input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-right: 10px;
    }
    .chat-input button {
      padding: 10px 20px;
      border: none;
      background-color: #007bff;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    .chat-input button:hover {
      background-color: #0056b3;
    }
    .message {
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 5px;
      max-width: 70%;
    }
    .message.user {
      background-color: #007bff;
      color: white;
      align-self: flex-end;
    }
    .message.bot {
      background-color: #e9ecef;
      color: black;
      align-self: flex-start;
    }
  </style>
</head>
<body style="background-color: beige; display: flex; flex-direction: column; min-height: 100vh;">
  <nav class="navbar navbar-expand-lg bg-dark border-bottom border-5 border-warning">
    <div class="container-fluid">
      <a class="navbar-brand text-white fw-bold" href="">
        <h1 class="mb-0"><i class="bi bi-chat-right-heart-fill text-dark"></i><b>&nbsp;Kenvtse</b></h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
        <ul class="navbar-nav me-3 my-2 my-lg-0 navbar-nav-scroll">
          <li class="nav-item">
            <a class="nav-link text-white" href="" style="font-size: 20px;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="" style="font-size: 20px;">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" style="font-size: 20px;">Keunggulan</a>
          </li>
        </ul>

        <!-- Login Button -->
        <a href="index.php?page=logout.php" class="btn btn-warning"><b> Logout </b><i class="bi bi-box-arrow-left"></i></a>
      </div>
    </div>
  </nav>

  <div class="container mt-4 flex-grow-1">
    <div class="p-5 text-dark d-flex align-items-center justify-content-center" 
         style="border-top: 4px solid gold; 
                border-right: 20px solid gold; 
                border-top-right-radius: 40px;
                border-radius: 0 0 50px 10px;">

      <!-- Text Content -->
      <div class="text-center">
        <h2 style="font-size:60px;"><b>Welcome, <?php echo $_SESSION['full_name'];?>!</b></h2>
        <p>This is the user dashboard.</p>
      </div>
    </div>

    <!-- Chat Container -->
    <div class="chat-container mt-4">
      <div class="chat-header">
        Chat with Leonor AI
      </div>
      <div class="chat-messages" id="chat-messages">
        <div class="message bot">
          Hello! How can I assist you today?
        </div>
        <div class="message user">
          Hi, I need help with my account.
        </div>
      </div>
      <div class="chat-input">
        <input type="text" id="chat-input" placeholder="Type your message...">
        <button id="send-button">Send</button>
      </div>
    </div>
  </div>

  <footer class="bg-dark text-white text-center mt-auto py-2" style="padding: 20px 0;">
    <div class="container">
      <p>&copy;<b> OUR SOCIAL MEDIA</b></p>
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

  <script>
    document.getElementById('send-button').addEventListener('click', function() {
      const input = document.getElementById('chat-input');
      const message = input.value.trim();
      if (message) {
        const chatMessages = document.getElementById('chat-messages');
        const userMessage = document.createElement('div');
        userMessage.className = 'message user';
        userMessage.textContent = message;
        chatMessages.appendChild(userMessage);

        // Simulate bot response
        setTimeout(() => {
          const botMessage = document.createElement('div');
          botMessage.className = 'message bot';
          botMessage.textContent = 'This is a simulated response.';
          chatMessages.appendChild(botMessage);
          chatMessages.scrollTop = chatMessages.scrollHeight;
        }, 1000);

        input.value = '';
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }
    });

    document.getElementById('chat-input').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        document.getElementById('send-button').click();
      }
    });
  </script>
</body>
</html>