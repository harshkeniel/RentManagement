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
                                                <header>Extra Charges</header>
                                                <form action="#" enctype="multipart/form-data">
                                                    <div id="error-text" class="error-text">This is an error message!!</div>  
                                                    <div class="field input">
                                                        <input type="text" value="Add charges for All Users(next month)" disabled>
                                                    </div>      
                                                    <div class="field input">
                                                        <label>Amount</label>
                                                        <input type="text" name="amount" id="amount" placeholder="Enter Amount" required>
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </div>
                                                    <div class="field input">
                                                        <label>Reason</label>
                                                        <textarea name="reason" id="reason" rows="3" placeholder="Enter Reason" required></textarea>
                                                        <i class="fas fa-question-circle"></i>
                                                    </div>
                                                    <div class="field button">
                                                    <input type="submit" name="submit" value="Add Charges">
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
<script src="./js/extra_charges.js"></script>
<?php
    include_once("../includes/scripts.php");
?>    
</body>

</html>
