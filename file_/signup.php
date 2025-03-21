<?php
// Pastikan session hanya dimulai jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include './config/db.php';

$show_success_modal = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form dan bersihkan input
    $full_name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $terms = isset($_POST['terms']) ? true : false;
    $role_id = 1;

    $errors = [];

    // Validasi Nama
    if (empty($full_name)) {
        $errors[] = "Full name is required!";
    } elseif (strlen($full_name) < 3) {
        $errors[] = "Full name must be at least 3 characters long!";
    }

    // Validasi Email
    if (empty($email)) {
        $errors[] = "Email is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format!";
    } else {
        // Cek apakah email sudah terdaftar
        $stmt = $conn->prepare("SELECT id FROM tb_users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $errors[] = "Email already registered!";
        }
        $stmt->close();
    }

    // Validasi Password
    if (empty($password)) {
        $errors[] = "Password is required!";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long!";
    }

    // Validasi Konfirmasi Password
    if (empty($confirm_password)) {
        $errors[] = "Password confirmation is required!";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match!";
    }

    // Validasi Persetujuan Syarat
    if (!$terms) {
        $errors[] = "You must agree to the terms and conditions!";
    }

    // Jika tidak ada error, simpan ke database
    if (empty($errors)) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT); // Hash password sekali saja!

        // Insert data ke database
        $stmt = $conn->prepare("INSERT INTO tb_users (full_name, email, password, role_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $full_name, $email, $password_hashed, $role_id);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Registration successful! Please login.";
            echo "<script>window.location.href = 'index.php?page=login';</script>";
            exit();
        } else {
            $errors[] = "Registration failed! Error: " . $conn->error;
        }
        $stmt->close();
    }

    // Jika ada error, tampilkan dalam bentuk alert
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}
?>



<div style="min-height: 100vh; display: flex; align-items: stretch; background: #fff;">
    <!-- Left Side -->
    <div style="flex: 1; background: linear-gradient(135deg, #0d6efd, #0a58ca); display: flex; align-items: center; justify-content: center; padding: 20px;">
        <div style="text-align: center; color: white;">
            <h1 style="font-size: 48px; margin-bottom: 20px; letter-spacing: 3px;">
                <i class="bi bi-star-fill" style="color: #ffc107;"></i> 
                <i class="bi bi-star-fill" style="color: #ffc107;"></i> 
                <i class="bi bi-star-fill" style="color: #ffc107;"></i> 
                <br/>
                <a class="fw-bolder text-white">Starvee</a>
            </h1>
            <p style="font-size: 18px; opacity: 0.9;">Join us and explore a world of possibilities!</p>
        </div>
    </div>

    <!-- Right Side -->
    <div style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 50px; background: rgba(255, 255, 255, 0.95);">
        <div style="width: 100%; max-width: 480px; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">

            <h2 style="color: #000; font-size: 25px; margin-bottom: 30px; text-align: center;">
                Sign Up for Free<br/>
                <small class="text-muted" style="font-size: 14px;">Please fill in your details</small>
            </h2>

            <!-- Error Message -->
            <?php if (!empty($errors)): ?>
                <div style="background: #dc3545; border-radius: 10px; padding: 15px; color: white; margin-bottom: 20px; text-align: center;">
                    <?php foreach ($errors as $error): ?>
                        <p style="margin: 0;"><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Form Start -->
            <form action="" method="POST">
                <div style="margin-bottom: 20px;">
                    <label style="font-weight: bold;">Full Name</label>
                    <input type="text" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required 
                        class="form-control" placeholder="Enter your full name"
                        style="padding: 12px; border-radius: 10px; border: 1px solid #ddd; font-size: 16px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="font-weight: bold;">Email</label>
                    <input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required 
                        class="form-control" placeholder="Enter your email"
                        style="padding: 12px; border-radius: 10px; border: 1px solid #ddd; font-size: 16px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="font-weight: bold;">Password</label>
                    <div style="position: relative;">
                        <input type="password" name="password" id="signupPassword" required class="form-control" 
                            placeholder="Create a password"
                            style="padding: 12px; border-radius: 10px; border: 1px solid #ddd; font-size: 16px;">
                        <span onclick="togglePassword('signupPassword', this)" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                            <i class="bi bi-eye-slash" id="toggleIconSignup"></i>
                        </span>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="font-weight: bold;">Confirm Password</label>
                    <div style="position: relative;">
                        <input type="password" name="confirm_password" id="confirmPassword" required class="form-control" 
                            placeholder="Confirm your password"
                            style="padding: 12px; border-radius: 10px; border: 1px solid #ddd; font-size: 16px;">
                        <span onclick="togglePassword('confirmPassword', this)" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                            <i class="bi bi-eye-slash" id="toggleIconConfirm"></i>
                        </span>
                    </div>
                </div>

                <div style="margin-bottom: 20px; display: flex; align-items: center;">
                    <input type="checkbox" name="terms" id="terms" required style="margin-right: 8px;">
                    <label for="terms" style="font-size: 14px;">
                        I agree to the <a href="#" style="color: #0d6efd; font-weight: 600;">Terms and Conditions</a>
                    </label>
                </div>

                <button type="submit" class="bg-primary" 
                    style="width: 100%; padding: 15px; background: #0d6efd; color: white; border: none; border-radius: 10px; font-size: 16px; font-weight: 600; cursor: pointer;">
                    Sign Up <i class="bi bi-arrow-right" style="margin-left: 8px;"></i>
                </button>
            </form>

            <p style="text-align: center; margin-top: 20px; font-size: 14px;">
                Already have an account? 
                <a href="index.php?page=login" style="color: #0d6efd; font-weight: 600;">Login</a>
            </p>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Registration Successful!</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="bi bi-check-circle-fill" style="font-size: 50px; color: #28a745;"></i>
                <p class="mt-3">Your account has been successfully created! You will be redirected to the login page shortly.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="window.location.href='index.php?page=login'">Go to Login</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Registration Successful!</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="bi bi-check-circle-fill" style="font-size: 50px; color: #28a745;"></i>
                <p class="mt-3">Your account has been successfully created! You will be redirected to the login page shortly.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="window.location.href='index.php?page=login'">Go to Login</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function togglePassword(inputId, icon) {
    const input = document.getElementById(inputId);
    const iconElement = icon.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        iconElement.classList.remove('bi-eye-slash');
        iconElement.classList.add('bi-eye');
    } else {
        input.type = 'password';
        iconElement.classList.remove('bi-eye');
        iconElement.classList.add('bi-eye-slash');
    }
}

// Show success modal if registration is successful
<?php if ($show_success_modal): ?>
    document.addEventListener('DOMContentLoaded', function() {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'), {
            backdrop: 'static',
            keyboard: false
        });
        successModal.show();

        // Redirect ke login page setelah 3 detik
        setTimeout(function() {
            window.location.href = 'index.php?page=login';
        }, 3000);
    });
<?php endif; ?>
</script>
</body>
</html>