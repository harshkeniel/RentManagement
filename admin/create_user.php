<?php
    session_start();
    if(!isset($_SESSION['ID'])){
        header("location: index.php");
    }
    include_once("../includes/header.php");
?>

<body>
  <?php
    include_once("navbar.php");
  ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                      <div class="row" id="main-body">
                                        <div class="wrapper">
                                          <section class="form signup">
                                              <header>Create New User</header>
                                              <form action="#" enctype="multipart/form-data">
                                                <div id="error-text" class="error-text">This is an error message!!</div>
                                                <div class="name-details">
                                                  <div class="field input">
                                                    <label>First Name</label>
                                                    <input type="text" name="fname" id="fname" pattern="[A-Za-z]+" placeholder="First name" required>
                                                  </div>
                                                  <div class="field input">
                                                    <label>Last Name</label>
                                                    <input type="text" name="lname" id="lname" pattern="[A-Za-z]+" placeholder="Last name" required>
                                                  </div>
                                                </div>
                                                <div class="field input">
                                                  <label>Email Address</label>
                                                  <input type="email" name="email" placeholder="Enter Email" required>
                                                  <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="field input">
                                                    <label>Phone Number</label>
                                                    <input type="text" name="pnumber" id="pnumber" placeholder="Enter Phone Number" required>
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                                <div class="field input">
                                                    <label>Aadhar Number</label>
                                                    <input type="text" name="anumber" id="anumber" placeholder="Enter Aadhar Number" required>
                                                    <i class="fas fa-fingerprint"></i>
                                                  </div>
                                                <div class="field input">
                                                    <label>Pan Number</label>
                                                    <input type="text" name="pannumber" id="pannumber" placeholder="Enter Pan Number" required>
                                                    <i class="fas fa-id-card"></i>
                                                </div>
                                                <div class="field input">
                                                    <label>Deposit</label>
                                                    <input type="text" name="deposit" id="deposit" placeholder="Enter Deposit" required>
                                                    <i class="fas fa-rupee-sign"></i>
                                                </div>
                                                <div class="field button">
                                                  <input type="submit" name="submit" value="Create User">
                                                </div>
                                              </form>
                                          </section>  
                                        </div>
                                      </div>
                                    </div>

                                    <div id="styleSelector">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
<script src="./js/create_user.js"></script>    
<?php
    include_once("../includes/scripts.php");
?>  
</body>

</html>
