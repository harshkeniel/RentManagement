<?php
  session_start();
  if(isset($_SESSION['ID'])){
    header("location: dashboard.php");
  }
  include_once("../includes/header.php");
?>
<body>
  <div class="center_div">
    <div class="wrapper">
      <section class="form login">
        <header>ADMIN LOGIN</header>
        <form method="POST">
          <div class="error-text">This is an error message!!</div>
          <div class="field input">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>
            <i class="fas fa-envelope"></i>
          </div>
          <div class="field input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
            <i class="fas fa-eye"></i>
          </div>
          <div class="field button">
            <input type="submit" name="submit" value="Log In">
          </div>
        </form>
      </section>
    </div>
  </div>
  <script src="./js/login.js"></script>
</body>
</html>
