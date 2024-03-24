<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>

.kotak-login {
  width: 300px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 24px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-top: 140px;
}

.kotak-login h3 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 16px;
}

.kotak-login h4 {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 32px;
}

.login-form label {
  font-size: 16px;
  margin-bottom: 8px;
}

.login-form input[type="text"],
.login-form input[type="password"] {
  padding: 8px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%;
  box-sizing: border-box;
  margin-bottom: 16px;
}

.login-button {
  padding: 8px 16px;
  font-size: 16px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

.login-button:hover {
  background-color: #45a049;
}
    </style>
</head>
<body>
    
    <div class="kotak-login">
        <h3>E - Ticketing</h3>
        <h4>Login your account</h4>

        <form class="login-form" action="process.php" method="POST">
            <label for="username">Username</label><br />
            <input type="text" name="username" id="username" class="form-control"><br /><br />

            <label for="password">Password</label><br />
            <input type="password" name="password" id="password" class="form-control"><br /> <br />

            <button class="login-button" type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>