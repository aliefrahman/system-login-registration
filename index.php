<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Registration System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light">
  <div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
      <div class="col-md-5">
        <div class="card shadow-lg">
          <div class="card-header bg-primary text-white text-center py-3">
            <h4 class="toggle-text">Login</h4>
          </div>
          <div class="card-body p-4">
            <!-- Login Form -->
            <form id="loginForm" class="needs-validation" novalidate>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" required>
                  <span class="input-group-text toggle-password">
                    <i class="fas fa-eye"></i>
                  </span>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
              <p class="text-center">
                Don't have an account?
                <a href="#" class="toggle-form">Register here</a>
              </p>
            </form>

            <!-- Register Form -->
            <form id="registerForm" class="needs-validation d-none" novalidate>
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" required>
                  <span class="input-group-text toggle-password">
                    <i class="fas fa-eye"></i>
                  </span>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Role</label>
                <select class="form-select" required>
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>
              <p class="text-center">
                Already have an account?
                <a href="#" class="toggle-form">Login here</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>