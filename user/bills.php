<?php
    require_once("./backend/validation.php");
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
                                                        <select class="form-select" name="id" onchange="file(this.value)" required>
                                                            <option selected disabled>Select Month</option>
                                                            <?php
                                                                $sql=mysqli_query($conn,"SELECT * FROM lightbill WHERE user_id = {$_SESSION['USER_ID']} AND receipt = '' ");
                                                                $file = true;
                                                                while($row = mysqli_fetch_assoc($sql)){
                                                                    $file = false;
                                                            ?>        
                                                                    <option value=<?php echo $row["id"] ?>><?php echo date('F Y', strtotime($row['date'])); ?></option>';
                                                            <?php        
                                                                }
                                                                if($file){
                                                                    echo '<option disabled>All bills are paid!</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="field input">
                                                        <label>Amount</label>
                                                        <input type="text" name="amount" id="amount" placeholder="Select a month to view amount" disabled>
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </div>
                                                    <div class="field file">
                                                        <label>Select Light Bill Receipt</label>
                                                        <input type="file" name="receipt" accept="application/pdf" required>
                                                    </div>
                                                    <div class="field button">
                                                        <button type="button" class="btn btn-info" id="view" disabled>View Light Bill</button>
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
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Light Bill</th>
                                                    <th>Receipt</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $id = $_SESSION['USER_ID']; 
                                                    $sql = mysqli_query($conn,"SELECT * FROM lightbill WHERE user_id=$id");
                                                    while($row = mysqli_fetch_assoc($sql)){
                                                        echo '<tr>';
                                                                if(empty($row['file'])){  
                                                                    echo '<td>-</td>
                                                                            <td>-</td>
                                                                            <td style="color:red;font-weight:bold;">FILE NOT UPLOADED</td>';
                                                                    
                                                                }
                                                                else{
                                                                    $date = date('F Y', strtotime($row['date']));
                                                                    $file = "../files/".$id."/lightbill/".$row['file'];
                                                                    echo '<td>'.$date.'</td>
                                                                            <td>'.$row['amount'].'</td>
                                                                            <td><button class="btn btn-primary" onclick = window.open("'.$file.'")>View</button></td>';
                                                                }
                                                                if(empty($row['receipt'])){  
                                                                    echo '<td style="color:red;font-weight:bold;">FILE NOT UPLOADED</td>';
                                                                }
                                                                else{
                                                                    $file1 = "../files/".$id."/lightbill/receipt/".$row['receipt'];
                                                                    echo '<td><button class="btn btn-primary" onclick = window.open("'.$file1.'")>View</button></td>';
                                                                }
                                                                echo '</tr>';
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
