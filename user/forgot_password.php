<?php
  session_start();
  if(isset($_SESSION['USER_ID'])){
    header("location: dashboard.php");
  }
  include_once("../includes/header.php");
?>
<body>
  <div class="center_div">
    <div class="wrapper">
      <section class="form login">
        <header>Forgot Password</header>
        <form>
      <div class="error-text">This is an error message!!</div>
          <div class="field input">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>
        <i class="fas fa-envelope"></i>
          </div>
          <div class="field input otp" hidden>
            <label>OTP</label>
            <input type="text" name="otp" placeholder="Enter OTP">
            <i class="fas fa-key"></i>
          </div>
          <div class="field input pswrd" hidden>
            <label>New Password</label>
            <input type="password" name="password" placeholder="Enter new password">
            <i class="fas fa-eye"></i>
          </div>
          <div class="field button">
            <input type="submit" name="submit" value="Send OTP">
          </div>
        </form>
        <div class="link"><a href="index.php">Login Now</a></div>
      <div class="link">Any Queries? <a href="contact_us.php">Contact Us</a></div>
      </section>
    </div>
  </div>  
  
  <script src="./js/forgot_password.js"></script>
</body>
</html>