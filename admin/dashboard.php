<?php
    session_start();
    if(!isset($_SESSION['ID'])){
      header("location: index.php");
    }
    include_once("../includes/header.php");
    echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">';

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
                                      <div class="row">
                                            <?php
                                                $sqlh = mysqli_query($conn, "SELECT * FROM user");
                                                $users = mysqli_num_rows($sqlh);
                                                $sqlh1 = mysqli_query($conn, "SELECT * FROM payment WHERE status=1");
                                                $paid = mysqli_num_rows($sqlh1);
                                                $sqlh2 = mysqli_query($conn, "SELECT * FROM payment WHERE status=0");
                                                $unpaid = mysqli_num_rows($sqlh2);
                                                $sqlh3 = mysqli_query($conn, "SELECT * FROM feedback WHERE response=''");
                                                $pf = mysqli_num_rows($sqlh3);
                                                $sqlh4 = mysqli_query($conn, "SELECT * FROM feedback");
                                                $f = mysqli_num_rows($sqlh4);
                                                $sqlh5 = mysqli_query($conn, "SELECT * FROM admin");
                                                $rowh = mysqli_fetch_assoc($sqlh5);
                                                $sqlh6 = mysqli_query($conn, "SELECT * FROM user WHERE removed = 1");
                                                $leftuser = mysqli_num_rows($sqlh6);

                                            ?>
                                             <!-- order-card start -->
                                             <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-blue order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Total Users</h6>
                                                        <h2 class="text-right"><i class="fa fa-users f-left" aria-hidden="true"></i><span><?php echo $users;?></span></h2>
                                                        <p class="m-b-0">Left<span class="f-right"><?php echo $leftuser;?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-pink order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Pending Payments</h6>
                                                        <h2 class="text-right"><i class="fa fa-rupee-sign f-left"></i><span><?php echo $unpaid;?></span></h2>
                                                        <p class="m-b-0">Paid<span class="f-right"><?php echo $paid;?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-yellow order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Pending Feedbacks</h6>
                                                        <h2 class="text-right"><i class="ti-reload f-left"></i><span><?php echo $pf;?></span></h2>
                                                        <p class="m-b-0">Total<span class="f-right"><?php echo $f;?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-lite-green order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-10 text-left">Last Click: <?php echo date('d F Y', strtotime($rowh['btn_date'])); ?></h6>
                                                        <button class="btn btn-primary btn-round btn-sm m-b-5" onclick="total(0)">Calculate Rent</button>
                                                        <button class="btn btn-light btn-round btn-sm m-b-5 m-l-5" onclick="reminder(0)">Reminder</button><br>
                                                        <button class="btn btn-danger btn-round btn-sm " onclick="fine(0)">Add Fine</button>
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
                                                                <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-users"></i>Pay Status</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fas fa-bolt"></i>Light Bill</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#tab3" role="tab"><i class="fas fa-user"></i>Rent/Reminder</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                        </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content card-block">
                                                            <div class="tab-pane active" id="home3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table user_table" id="table_id1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th>Contact</th>
                                                                                <th>Amount</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                $sql = mysqli_query($conn, "SELECT * FROM user WHERE removed = 0");
                                                                                
                                                                                while($row = mysqli_fetch_assoc($sql)){

                                                                                    $sql1 = mysqli_query($conn,"SELECT * FROM payment WHERE user_id={$row['user_id']}");
                                                                                    $row1 = mysqli_fetch_assoc($sql1);
                                                                                    echo '<tr>
                                                                                            <td>'.$row['name'].'</td>
                                                                                            <td>'.$row['phone'].'</td>
                                                                                            <td>'.$row1['total'].'</td>';
                                                                                            if($row1['status']==0){  
                                                                                                echo '<td><span class="label label-danger" style="font-size:inherit;">UNPAID</span></td>';
                                                                                            }
                                                                                            else{
                                                                                                echo '<td><span class="label label-primary" style="font-size:inherit;">PAID</span></td>';
                                                                                            }
                                                                                            echo '</tr>';
                                                                                    
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="profile3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                <table class="table user_table" id="table_id2">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th>Contact</th>
                                                                                <th>Date</th>
                                                                                <th>Amount</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                $sql = mysqli_query($conn, "SELECT * FROM user WHERE removed = 0");
                                                                                
                                                                                while($row = mysqli_fetch_assoc($sql)){

                                                                                    $sql1 = mysqli_query($conn,"SELECT * FROM lightbill WHERE user_id={$row['user_id']}");
                                                                                    while($row1 = mysqli_fetch_assoc($sql1)){
                                                                                        if(date('F Y', strtotime($row1['date']))==date('F Y')){
                                                                                            echo '<tr>
                                                                                                    <td>'.$row['name'].'</td>
                                                                                                    <td>'.$row['phone'].'</td>
                                                                                                    <td>'.date('F Y', strtotime($row1['date'])).'</td>
                                                                                                    <td>'.$row1['amount'].'</td>';
                                                                                                    if($row1['receipt']==""){  
                                                                                                        echo '<td><span class="label label-danger" style="font-size:inherit;">UNPAID</span></td>';
                                                                                                    }
                                                                                                    else{
                                                                                                        echo '<td><span class="label label-primary" style="font-size:inherit;">PAID</span></td>';
                                                                                                    }
                                                                                                    echo '</tr>';
                                                                                        }
                                                                                    }
                                                                                    
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane" id="tab3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                <table class="table user_table" id="table_id3">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th>Contact</th>
                                                                                <th>Amount</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                $sql = mysqli_query($conn, "SELECT * FROM user WHERE removed = 0");
                                                                                
                                                                                while($row = mysqli_fetch_assoc($sql)){

                                                                                    $sql1 = mysqli_query($conn,"SELECT * FROM payment WHERE user_id={$row['user_id']}");
                                                                                    $row1 = mysqli_fetch_assoc($sql1);
                                                                                    echo '<tr>
                                                                                            <td>'.$row['name'].'</td>
                                                                                            <td>'.$row['phone'].'</td>
                                                                                            <td>'.$row1['total'].'</td>';
                                                                                            if($row1['status']==0){  
                                                                                                echo '<td><button class="btn btn-primary btn-round btn-sm" onclick="total('.$row['user_id'].')">Calculate Rent</button>
                                                                                                        <button class="btn btn-info btn-round btn-sm m-l-5" onclick="reminder('.$row['user_id'].')">Reminder</button>
                                                                                                        <button class="btn btn-danger btn-round btn-sm m-l-5" onclick="fine('.$row['user_id'].')">Add Fine</button></td>';
                                                                                            }
                                                                                            else{
                                                                                                echo '<td><span class="label label-primary" style="font-size:inherit;">PAID</span></td>';
                                                                                            }
                                                                                            echo '</tr>';
                                                                                    
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
<?php
    include_once("../includes/scripts.php");
?> 
<script src="./js/dashboard.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id1').DataTable();
    } );
    $(document).ready( function () {
        $('#table_id2').DataTable();
    } );
    $(document).ready( function () {
        $('#table_id3').DataTable();
    } );
</script>  
</body>

</html>
