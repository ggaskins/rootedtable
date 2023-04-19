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
    
    .scene {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }

    .farmer,
    .cloud {
      position: absolute;
      bottom: 10%;
    }

    .farmer {
      left: 10%;
      width: 30px;
      height: 60px;
      background-color: #000;
      animation: farmerAnimation 2s infinite alternate;
    }

    .farmer::before {
      content: "";
      position: absolute;
      top: -20px;
      left: 50%;
      margin-left: -10px;
      width: 20px;
      height: 20px;
      background-color: #000;
      border-radius: 50%;
    }

    .cloud {
      left: 0;
      width: 60px;
      height: 30px;
      background-color: #fff;
      border-radius: 50%;
      opacity: 0.8;
      animation: cloudAnimation 10s linear infinite;
    }

    .cloud::before {
      content: "";
      position: absolute;
      top: 0;
      left: 20px;
      width: 40px;
      height: 40px;
      background-color: #fff;
      border-radius: 50%;
    }

    @keyframes farmerAnimation {
      0% {
        transform: translateY(0);
      }
      100% {
        transform: translateY(-10px);
      }
    }

    @keyframes cloudAnimation {
      0% {
        transform: translateX(-100%);
      }
      100% {
        transform: translateX(100%);
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="scene">
      <div class="farmer"></div>
      <div class="cloud"></div>
    </div>
    <form class="login-form" action="authenticate.php" method="post">
      <h2>Login</h2>
      <input type="email" name="email" class="form-control" placeholder="Email" required>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <input type="submit" value="Login" class="submit-button">
    </form>
  </div>
</body>
</html>
