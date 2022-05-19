<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="./login.css" />
    <link rel="shortcut icon" href="../img/logo.png" />
    <title>Login</title>
  </head>

  <body>
    <div class="container">
      <header>
        <img
          src="../img/logo.png"
          alt="logo ovelha laranja"
          style="height: 80px"
        />
        <h1>Welcome back!</h1>
        <p>Sign in to your account.</p>
      </header>
      <main>
        <form action="./loginTest.php" method="POST">
          <section>
            <div class="email">
              <label for="email">E-mail</label>
              <input type="email" name="email" />
            </div>
            <div class="password">
              <label for="password">Password</label>
              <input type="password" name="password" />
            </div>
          </section>
          <div class="remember">
            <input type="checkbox" />
            <label for="remember">Remember me</label>
          </div>
          <div class="submit">
            <button type="submit" name="submit">SIGN IN</button>
          </div>
        </form>
      </main>
      <footer>
        <p>
          Don't have an account?
          <a href="../register/register.php">Register.</a>
        </p>
      </footer>
    </div>
  </body>
</html>
