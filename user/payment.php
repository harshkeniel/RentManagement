<?php
    require_once("./backend/validation.php");
    include_once("../includes/header.php");
?>

<body>
  <?php
    include_once("navbar.php");
    $sql = mysqli_query($conn, "SELECT * FROM payment WHERE user_id = {$_SESSION['USER_ID']}");
    $row = mysqli_fetch_assoc($sql);
    $description = str_replace(",","\n",$row['description']);
  ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                      <div class="row" id="main-body">

                                        <div class="wrapper">
                                            <section class="form signup">
                                                <header>Payment</header>
                                                <form action="#" enctype="multipart/form-data">
                                                    <div id="error-text" class="error-text">This is an error message!!</div>      
                                                    <div class="field input">
                                                        <label>Amount</label>
                                                        <input type="text" name="amount" id="amount" value = "<?php echo $row['total'];?>" disabled>
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </div>
                                                    <div class="field input">
                                                        <label>Description</label>
                                                        <textarea name="description" id="description" rows="5" disabled><?php echo $description;?></textarea>
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                    <div class="field button">
                                                    <input type="submit" name="submit" value="Pay Now">
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="./js/payment.js"></script>
<?php
    include_once("../includes/scripts.php");
?>    
</body>

</html>
