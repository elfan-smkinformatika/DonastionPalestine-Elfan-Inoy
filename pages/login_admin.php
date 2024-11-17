<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN | LOGIN</title>
  <link rel="stylesheet" href="style_loginAdmin.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <style>
    body {
      height: 100vh;
    }
  </style>
</head>

<body class="d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center">Login Admin</h3>
            <form action="../query/proses_login.php" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>