<?php
    require_once("./backend/validation.php");
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
                
                                                <div id="note-full-container" class="note-has-grid row">
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
                                                                        <div class="d-flex">
                                                                            <button class="btn btn-sm btn-info" onclick="window.location.href=`feedback.php?n_id='.$row['id'].'`">Reply</button>
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
<?php
    include_once("../includes/scripts.php");
?>    
</body>

</html>
