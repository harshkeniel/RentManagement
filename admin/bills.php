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
                                        <div class="wrapper">
                                            <section class="form signup">
                                                <header>Light Bill Upload</header>
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
                                                        <label>Date</label>
                                                        <input type="date" name="date" id="date" required>
                                                    </div>
                                                    <div class="field input">
                                                        <label>Amount</label>
                                                        <input type="text" name="amount" id="amount" placeholder="Enter Amount" required>
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </div>
                                                    <div class="field file">
                                                        <label>Select Light Bill</label>
                                                        <input type="file" name="light_bill" accept="application/pdf" required>
                                                    </div>
                                                    <div class="field button">
                                                    <input type="submit" name="submit" value="Upload">
                                                    </div>
                                                </form>
                                            </section>  
                                        </div>  
                                        <div class="table_wrapper" style="margin-top:40px;"> 
                                        <table id="table_id" class="user_table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Light Bill</th>
                                                    <th>Receipt</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE removed = 0");
                                                    
                                                    while($row = mysqli_fetch_assoc($sql)){

                                                        $sql1 = mysqli_query($conn,"SELECT * FROM lightbill WHERE user_id={$row['user_id']}");
                                                        $user = true;
                                                        while($row1 = mysqli_fetch_assoc($sql1)){
                                                            $user = false;
                                                            echo '<tr>
                                                                    <td>'.$row['name'].'</td>';

                                                                    if(empty($row1['file'])){  
                                                                        echo '<td>-</td>
                                                                                <td>-</td>
                                                                                <td style="color:red;font-weight:bold;">FILE NOT UPLOADED</td>';
                                                                        
                                                                    }
                                                                    else{
                                                                        $date = date('F Y', strtotime($row1['date']));
                                                                        $file = "../files/".$row['user_id']."/lightbill/".$row1['file'];
                                                                        echo '<td>'.$date.'</td>
                                                                                <td>'.$row1['amount'].'</td>
                                                                                <td><button class="btn btn-primary" onclick = window.open("'.$file.'")>View</button></td>';
                                                                    }
                                                                    if(empty($row1['receipt'])){  
                                                                        echo '<td style="color:red;font-weight:bold;">FILE NOT UPLOADED</td>';
                                                                    }
                                                                    else{
                                                                        $file1 = "../files/".$row['user_id']."/lightbill/receipt/".$row1['receipt'];
                                                                        echo '<td><button class="btn btn-primary" onclick = window.open("'.$file1.'")>View</button></td>';
                                                                    }
                                                                    echo '</tr>';
                                                        }
                                                        if($user){
                                                            echo '<tr>
                                                                    <td>'.$row['name'].'</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td style="color:red;font-weight:bold;">FILE NOT UPLOADED</td> 
                                                                    <td style="color:red;font-weight:bold;">FILE NOT UPLOADED</td>
                                                                    </tr>';
                                                        }
                                                        
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
<script src="./js/bills.js"></script>
<?php
    include_once("../includes/scripts.php");
?>  
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>';
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>   
</body>

</html>
