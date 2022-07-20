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
                                          
                                            <div id="note-full-container" class="note-has-grid row">
                                                    <?php
                                                        
                                                        $sql = mysqli_query($conn,"SELECT * FROM feedback ORDER BY date DESC");
                                                        if(mysqli_num_rows($sql)>0){
                                                            
                                                            while($row = mysqli_fetch_assoc($sql)){
                                                                $sql1 = mysqli_query($conn,"SELECT * FROM user WHERE user_id = {$row['user_id']} AND removed = 0");
                                                                $row1 = mysqli_fetch_assoc($sql1);
                                                                $img = "";
                                                                if($row['img']!=""){
                                                                    $img = '<br><br><button class="btn btn-sm btn-info" onclick = window.open("../files/feedbackImg/'.$row['img'].'")>View Image</button>';
                                                                }
                                                                $file = "";
                                                                if($row['response_file']!=""){
                                                                    $file = '<br><br><button class="btn btn-sm btn-info" onclick = window.open("../files/responseFile/'.$row['response_file'].'")>View File</button>';
                                                                }
                                                                
                                                                $response = "";
                                                                $responseDiv =""; 
        
                                                                if($row['response']!=""){
                                                                    $response = '<br><br>----------------------------<br><b>Response:</b><br>'.$row['response'].$file;
                                                                    $responseDiv = '<button class="btn btn-sm btn-info" disabled>Already Responded</button>';
                                                                }
                                                                else{
                                                                    $responseDiv = '<form id="response">
                                                                                    <input type="text" name="id" value="'.$row['id'].'" hidden>
                                                                                    <input type="file" name="response_file" accept="application/pdf" hidden> 
                                                                                    <textarea name="reason" rows="3" data-placement="right" data-content="This field cannot be blank" placeholder="Enter Response" hidden required></textarea>
                                                                                    <button class="btn btn-sm btn-info reply" id="reply" onclick="show(this)">Reply</button>
                                                                                    <button class="btn btn-sm btn-info send" id="send" onclick="sent(this)" hidden>Send</button>
                                                                                    </form>';
                                                                }
                                                                echo '<div class="col-md-4 single-note-item all-category note-social">
                                                                    <div class="card card-body">
                                                                        <span class="side-stick"></span>
                                                                        <h5 class="note-title text-truncate w-75 mb-0">'.$row1['name'].'</h5>
                                                                        <p class="note-date font-12 text-muted">'.$row['date'].'</p>
                                                                        <div class="note-content">
                                                                            <p class="note-inner-content text-muted"><b style="font-size:16px;">'.$row['subject'].'</b><br><br>'.$row['msg'].$img.$response.'</p>
                                                                        </div>
                                                                        <div class="d-flex">'.$responseDiv.'</div>
                                                                    </div>
                                                                </div>';
                                                            }
                                                            echo '</div>';    
                                                        }
                                                        else{
                                                            echo '</div>';
                                                            echo '<div class="wrapper form" style="font-size:18px; font-weight:600; text-align:center">
                                                                    No Feedbacks Available</div>';
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
<script src="./js/feedback.js"></script> 
</body>

</html>
