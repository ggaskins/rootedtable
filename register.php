<!DOCTYPE html>
<html>
<head>
  <title>Register | Rooted Table</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header class="header">
    <h1 class="logo">Rooted Table</h1>
  </header>
  <div class="center">
    <form action="register_handler.php" method="post">
      <h2>Register</h2>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <label for="fname">First Name:</label>
      <input type="text" id="fname" name="fname" required>
      <label for="lname">Last Name:</label>
      <input type="text" id="lname" name="lname" required>
      <input type="submit" value="Register">
    </form>
  </div>
</body>
</html>
