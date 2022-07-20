<?php
  include_once("../includes/header.php");
  session_start();
  if(isset($_SESSION['otp'])){
    session_destroy();
  }
?>
<body>
  <div class="center_div">
    <div class="wrapper">
      <section class="form login">
        <header>Contact Us</header>
        <form>
          <div class="error-text">This is an error message!!</div>
          <div class="name-details">
            <div class="field input">
              <label>First Name</label>
              <input type="text" name="fname" id="fname" placeholder="First name" required>
            </div>
            <div class="field input">
              <label>Last Name</label>
              <input type="text" name="lname" id="lname" placeholder="Last name" required>
            </div>
          </div>
          <div class="field input">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>
            <i class="fas fa-at"></i>
          </div>
          <div class="field input">
              <label>Message</label>
              <textarea name="message" id="message" rows="3" placeholder="Enter Message" required></textarea>
              <i class="fas fa-envelope"></i>
          </div>
          <div class="field button">
            <button type="submit" name="submit"><span class="button__text">Send Message</span></button>
          </div>
        </form>
        <div class="link"><a href="index.php">Login Now</a></div>
    </section>  
    </div>
  </div>
<script src="./js/contact_us.js"></script>
</body>
</html>