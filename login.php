<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Arial, Helvetica, sans-serif;
    }

    .login-container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
      background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
      background-repeat: no-repeat;
      background-size: cover;
    }

    .login-form {
      width: 30%;
      min-width: 320px;
      max-width: 400px;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 5px;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
    }

    .submit-button {
      width: 100%;
      padding: 10px;
      background-color: #008CBA;
      border: none;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    .submit-button:hover {
      background-color: #0077A7;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <form class="login-form" action="authenticate.php" method="post">
      <h2>Login</h2>
      <input type="email" name="email" class="form-control" placeholder="Email" required>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <input type="submit" value="Login" class="submit-button">
    </form>
  </div>
</body>
</html>
