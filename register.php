<!DOCTYPE html>
<html>
  <head>
    <style>
      body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .header {
      background-color: #333;
      color: #fff;
      padding: 1rem;
    }

    .logo {
      margin: 0;
    }

    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      background-color: #fff;
      padding: 2rem;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    .form-title {
      text-align: center;
      margin-top: 0;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      padding: 0.5rem;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
      font-size: 1rem;
    }

    .btn {
      background-color: #333;
      color: #fff;
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      font-size: 1rem;
    }

    .btn:hover {
      background-color: #555;
    }
    </style>
    <title>Register | Rooted Table</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header class="header">
      <h1 class="logo">Rooted Table</h1>
    </header>
    <div class="center">
      <form action="register_handler.php" method="post">
        <h2 class="form-title">Register</h2>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" id="fname" name="fname" required>
        </div>
        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" id="lname" name="lname" required>
        </div>
        <div class="form-group">
          <input type="submit" value="Register" class="btn">
        </div>
      </form>
    </div>
  </body>
</html>
