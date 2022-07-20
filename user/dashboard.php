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
                                            <?php
                                                $id = $_SESSION['USER_ID'];
                                                $sqlh = mysqli_query($conn,"SELECT * FROM payment WHERE user_id = {$id} ");
                                                $row = mysqli_fetch_assoc($sqlh);
                                                if($row['status']==0){
                                                    $status = "Unpaid";
                                                }
                                                else{
                                                    $status = "Paid";
                                                }

                                                $sqlh1 = mysqli_query($conn,"SELECT * FROM lightbill WHERE user_id = {$id} ORDER BY date DESC");
                                                $row1 = mysqli_fetch_assoc($sqlh1);
                                                if($row1==null){
                                                    $amount = 0;
                                                    $status1 = "No Data";
                                                }
                                                else{
                                                    if($row1['receipt']==""){
                                                        $status1 = "Unpaid";
                                                        $amount = $row1['amount'];
                                                    }
                                                    else if($row1['receipt']!=""){
                                                        $status1 = "Paid";
                                                        $amount = $row1['amount'];
                                                    }
                                                }
                                                $date = date("Y-m-01");
                                                $sqlh2 = mysqli_query($conn,"SELECT * FROM notice WHERE date >= '{$date}'");
                                                $no = mysqli_num_rows($sqlh2);
                                                $sqlh3 = mysqli_query($conn,"SELECT * FROM notice ORDER BY date DESC");
                                                $row2 = mysqli_fetch_assoc($sqlh3);
                                                if($row2==null){
                                                    $notice = "No Data";
                                                }
                                                else{
                                                    $notice = $row2['subject'];
                                                }
                                                $sqlh4 = mysqli_query($conn,"SELECT * FROM user WHERE user_id = $id");
                                                $row4 = mysqli_fetch_assoc($sqlh4);

                                            ?>
                                            <!-- order-card start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-blue order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Rent (This month)</h6>
                                                        <h2 class="text-right"><i class="fa fa-rupee-sign f-left" aria-hidden="true"></i><span><?php echo $row['total']; ?></span></h2>
                                                        <p class="m-b-0">Status<span class="f-right"><?php echo $status; ?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-green order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Light Bill (This month)</h6>
                                                        <h2 class="text-right"><i class="fa fa-bolt f-left"></i><span><?php echo $amount; ?></span></h2>
                                                        <p class="m-b-0">Status<span class="f-right"><?php echo $status1; ?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-yellow order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Notices (This month)</h6>
                                                        <h2 class="text-right"><i class="fa fa-bullhorn f-left"></i><span><?php echo $no; ?></span></h2>
                                                        <p class="m-b-0">Latest<marquee class="f-right" style="width:110px;"><?php echo $notice; ?></marquee></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-pink order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Fine</h6>
                                                        <h2 class="text-right"><i class="ti-wallet f-left"></i><span><?php echo $row4['fine']; ?></span></h2>
                                                        <p class="m-b-0">Note:<marquee class="f-right" style="width:110px;">If rent not paid on/before 10th of every month then fine will be applied!!</marquee></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- order-card end -->

                                          
											<!-- tabs card start -->
                                            <div class="col-sm-12">
                                                <div class="card tabs-card">
                                                    <div class="card-block p-0">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs md-tabs" role="tablist" style="justify-content: space-evenly;">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-rupee-sign"></i>Payment Breakdown</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-rupee-sign"></i>Extra Charges</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                        </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content card-block">
                                                            <div class="tab-pane active" id="home3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Rent</th>
                                                                            <th>Maintenance</th>
                                                                            <th>Extra Charges</th>
                                                                            <th>Dues</th>
                                                                            <th>Fine</th>
                                                                            <th>Total</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php
                                                                                $description = $row['description'];
                                                                                $description = explode(",",$description);
                                                                                $rent = explode(" ",$description[0]);
                                                                                $maintenance = explode(" ",$description[1]);
                                                                                $extraCharges = explode(" ",$description[2]);
                                                                                $dues = explode(" ",$description[3]);
                                                                                $fine = 0;
                                                                                if(sizeof($description)>4){
                                                                                    $fine = explode(" ",$description[4]);
                                                                                    $fine = $fine[1];
                                                                                }
                                                                                echo '<td>'.$rent[1].'</td>
                                                                                        <td>'.$maintenance[1].'</td>
                                                                                        <td>'.$extraCharges[1].'</td>
                                                                                        <td>'.$dues[1].'</td>
                                                                                        <td>'.$fine.'</td>
                                                                                        <td>'.$row['total'].'</td>';
                                                                            ?>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="profile3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Date</th>
                                                                            <th>Amount</th>
                                                                            <th>Reason</th>
                                                                        </tr>
                                                                        <?php
                                                                            $sql = mysqli_query($conn,"SELECT * FROM extra_charges ORDER BY date DESC");
                                                                            $extra = true;
                                                                            while($row = mysqli_fetch_assoc($sql)){
                                                                                $date = date('F Y', strtotime($row['date']));
                                                                                $cdate = date('F Y', strtotime("-1 month"));
                                                                                if($date==$cdate){
                                                                                    $extra = false;
                                                                                    echo '<tr>
                                                                                            <td>'.$row['date'].'</td>
                                                                                            <td>'.$row['amount'].'</td>
                                                                                            <td>'.$row['reason'].'</td>
                                                                                            </tr>';
                                                                                }
                                                                                else if(date('Y', strtotime($date)) == date('Y', strtotime("-1 year"))){
                                                                                    break;
                                                                                }
                                                                            }
                                                                            if($extra){
                                                                                echo '<tr><td colspan="3">No Extra Charges for this Month</td></tr>';
                                                                            }
                                                                        ?>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div id="note-full-container" class="note-has-grid row">
                                                    <?php
                                                        
                                                        $sql = mysqli_query($conn,"SELECT * FROM feedback WHERE user_id = $id ORDER BY date DESC");
                                                        if(mysqli_num_rows($sql)>0){
                                                            
                                                            while($row = mysqli_fetch_assoc($sql)){
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
                                                                    $responseDiv = '<button class="btn btn-sm btn-info" disabled>Pending Response</button>';
                                                                }
                                                                echo '<div class="col-md-4 single-note-item all-category note-social">
                                                                    <div class="card card-body">
                                                                        <span class="side-stick"></span>
                                                                        <h5 class="note-title text-truncate w-75 mb-0">'.$row['subject'].'</h5>
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
                                                                    No Feedback Available</div>';
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
