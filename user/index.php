<?php
  session_start();
  if(isset($_SESSION['USER_ID'])){
    header("location: dashboard.php");
  }
  if(isset($_SESSION['otp'])){
    session_destroy();
  }
  include_once("../includes/header.php");
?>
<body>
  <div class="center_div">
    <div class="wrapper">
      <section class="form login">
        <header>LOGIN</header>
        <form>
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
        <div class="link">Forgot Password? <a href="forgot_password.php">Click Here</a></div>
      <div class="link">Any Queries? <a href="contact_us.php">Contact Us</a></div>
      </section>
    </div>
  </div>  
  
  <script src="./js/login.js"></script>
</body>
</html>