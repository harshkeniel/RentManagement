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
                                                <header>Notice</header>
                                                <form action="#" enctype="multipart/form-data">
                                                    <div id="error-text" class="error-text">This is an error message!!</div>  
                                                    <div class="field input">
                                                        <input type="text" value="Notice for All Users" disabled>
                                                        <i class="fas fa-users" style="top:35%;"></i>
                                                    </div>    
                                                    <div class="field input">
                                                        <label>Subject</label>
                                                        <input type="text" name="subject" id="subject" placeholder="Enter Subject" required>
                                                        <i class="fas fa-at"></i>
                                                    </div>  
                                                    <div class="field input">
                                                        <label>Message</label>
                                                        <textarea name="message" id="message" rows="3" placeholder="Enter Message" required></textarea>
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                    <div class="field button">
                                                    <input type="submit" name="submit" value="Send Notice">
                                                    </div>
                                                </form>
                                            </section>  
                                        </div>

                                        <div id="note-full-container" class="note-has-grid row" style="margin-top: 40px;">
                                                    <?php
                                                        
                                                        $sql = mysqli_query($conn,"SELECT * FROM notice ORDER BY date DESC");
                                                        if(mysqli_num_rows($sql)>0){

                                                            while($row = mysqli_fetch_assoc($sql)){

                                                                echo '<div class="col-md-4 single-note-item all-category note-social">
                                                                    <div class="card card-body">
                                                                        <span class="side-stick"></span>
                                                                        <h5 class="note-title text-truncate w-75 mb-0">'.$row['subject'].'</h5>
                                                                        <p class="note-date font-12 text-muted">'.$row['date'].'</p>
                                                                        <div class="note-content">
                                                                            <p class="note-inner-content text-muted"><b style="font-size:16px;">'.$row['subject'].'</b><br><br>'.$row['msg'].'</p>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                            }
                                                            echo '</div>';    
                                                        }
                                                        else{
                                                            echo '</div>';
                                                            echo '<div class="wrapper form" style="font-size:18px; font-weight:600; text-align:center">
                                                                    No Notices Available</div>';
                                                        }
                                                    ?>
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
<script src="./js/notice_board.js"></script>
<?php
    include_once("../includes/scripts.php");
?>    
</body>

</html>
