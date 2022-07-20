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
                                      <div class="row" id="main-body">
                                        <div class="table_wrapper"> 
                                        <header>User's Table</header>
                                        <table id="table_id" class="user_table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>User Id</th>
                                                    <th>Name</th>
                                                    <th>Deposit</th>
                                                    <th>Details</th>
                                                    <th>Total Charges</th>
                                                    <th>Status</th>
                                                    <th>Paid/Unpaid</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE removed = 0");
                                                    
                                                    while($row = mysqli_fetch_assoc($sql)){
                                                        $sql1 = mysqli_query($conn,"SELECT * FROM payment WHERE user_id = {$row['user_id']}");
                                                        $row1 = mysqli_fetch_assoc($sql1);
                                                        if($row1['status']==1){
                                                            $payment_done = 'paid'; 
                                                        }
                                                        else{
                                                            $payment_done = 'unpaid';
                                                        }
                                                        $sql2 = mysqli_query($conn,"SELECT * FROM lightbill WHERE user_id = {$row['user_id']} ORDER BY date DESC");
                                                        $row2 = mysqli_fetch_assoc($sql2);
                                                        if($row2==null){
                                                            $amount = 0;
                                                        }
                                                        else{
                                                            if($row2['receipt']==""){
                                                                $amount = $row2['amount'];
                                                            }
                                                            else if($row2['receipt']!=""){
                                                                $amount = 0;
                                                            }
                                                        }
                                                        echo '<tr>
                                                                <td>'.$row['user_id'].'</td>
                                                                <td>'.$row['name'].'</td>
                                                                <td>'.$row['deposit'].'</td>
                                                                <td><button class="btn btn-info btn-round btn-sm m-l-5" data-target="#exampleModal" data-toggle="modal" onclick="details('.$row['user_id'].','.$amount.')">View</button></td>';
                                                                if($payment_done==="paid"){  
                                                                    echo '<td>-</td>';
                                                                }
                                                                else{
                                                                    echo '<td>'.($row1['total'] + $amount).'</td>';
                                                                }
                                                                if(($row1['total'] + $amount)>$row['deposit']){  
                                                                    echo '<td><span class="label label-danger" style="font-size:inherit;">AMOUNT EXCEEDED</span></td>';        
                                                                }
                                                                else{
                                                                    echo '<td><span class="label label-primary" style="font-size:inherit;">AMOUNT NOT EXCEEDED</span></td>';       
                                                                }
                                                                if($payment_done==="paid"){  
                                                                    echo '<td><span class="label label-primary" style="font-size:inherit;">PAID</span></td>';
                                                                }
                                                                else{
                                                                    echo '<td><span class="label label-danger" style="font-size:inherit;">UNPAID</span></td>';
                                                                }
                                                                echo '</tr>';
                                                    } 
                                                ?>
                                            </tbody>
                                        </table> 
                                        </div>
                                            <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                        
                                        <div class="table_wrapper" style="margin-top:40px;"> 
                                        <header>Payment Details</header>
                                        <table id="table_id2" class="user_table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>User Id</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Payment ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM payment_details");

                                                    while($row = mysqli_fetch_assoc($sql)){
                                                        $sql1 = mysqli_query($conn,"SELECT * FROM user WHERE user_id = {$row['user_id']}");
                                                        $row1 = mysqli_fetch_assoc($sql1);
                                                        echo '<tr>
                                                                <td>'.$row['user_id'].'</td>
                                                                <td>'.$row1['name'].'</td>
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['amount'].'</td>
                                                                <td>'.$row['payment_id'].'</td>
                                                                </tr>';
                                                    } 
                                                ?>
                                            </tbody>
                                        </table> 
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
<script src="./js/user_table.js"></script>    
<?php
    include_once("../includes/scripts.php");
?> 
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } ); 
    $(document).ready( function () {
        $('#table_id2').DataTable();
    } );   
</script>          
</body>

</html>
