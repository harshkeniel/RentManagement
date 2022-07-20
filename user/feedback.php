<?php
    require_once("./backend/validation.php");
    include_once("../includes/header.php");
?>

<body>
  <?php
    include_once("navbar.php");

    $sub = null;
    if(isset($_GET['n_id'])){
        $sql = mysqli_query($conn,"SELECT * FROM notice WHERE id = {$_GET['n_id']}");
        $row = mysqli_fetch_assoc($sql);
        $sub = $row['subject'];
    }
  ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                      <div class="row" id="main-body">

                                        <div class="wrapper">
                                            <section class="form signup">
                                                <header>Feedback</header>
                                                <form action="#" enctype="multipart/form-data">
                                                    <div id="error-text" class="error-text">This is an error message!!</div>      
                                                    <div class="field input">
                                                        <label>Subject</label>
                                                        <input type="text" name="subject" id="subject" placeholder="Enter Subject" value = "<?php echo $sub;?>" required>
                                                        <i class="fas fa-at"></i>
                                                    </div>
                                                    <div class="field input">
                                                        <label>Message</label>
                                                        <textarea name="message" id="message" rows="3" placeholder="Enter Message" required></textarea>
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                    <div class="field file">
                                                        <label>Select Feedback Image</label>
                                                        <input type="file" name="feedback_img" accept="image/png,image/jpeg,image/jpg">
                                                    </div>
                                                    <div class="field button">
                                                    <input type="submit" name="submit" value="Send Feedback">
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
<script src="./js/feedback.js"></script>
<?php
    include_once("../includes/scripts.php");
?>    
</body>

</html>
