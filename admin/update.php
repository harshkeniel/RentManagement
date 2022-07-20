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
                                                <header>Update Details</header>
                                                <form action="#" enctype="multipart/form-data">
                                                    <div id="error-text" class="error-text">This is an error message!!</div>
                                                    <div class="field input select">
                                                        <select class="form-select" name="id" required>
                                                            <option selected disabled>Select User</option>
                                                            <?php
                                                                $sql=mysqli_query($conn,"SELECT * FROM user WHERE removed = 0");
                                                                while($row = mysqli_fetch_assoc($sql)){
                                                            ?>        
                                                                    <option value=<?php echo $row["user_id"] ?>><?php echo $row["name"] ?></option>';
                                                            <?php        
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="field input">
                                                        <label>Rent</label>
                                                        <input type="text" name="rent" id="rent" placeholder="Enter Rent" required>
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </div>
                                                    <div class="field input">
                                                        <label>Maintenance</label>
                                                        <input type="text" name="maintenance" id="maintenance" placeholder="Enter Maintenance" required>
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </div>
                                                    <div class="field input">
                                                        <label>Fine</label>
                                                        <input type="text" name="fine" id="fine" placeholder="Enter Fine" required>
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </div>
                                                    <div class="field button">
                                                    <input type="submit" name="submit" value="Update">
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
<script src="./js/update.js"></script>
<?php
    include_once("../includes/scripts.php");
?>    
</body>

</html>
