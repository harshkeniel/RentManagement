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
                                                <header>Agreement Upload</header>
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
                                                        <label>From</label>
                                                        <input type="date" name="fdate" id="fdate" required>
                                                    </div>
                                                    <div class="field input">
                                                        <label>To</label>
                                                        <input type="date" name="tdate" id="tdate" required>
                                                    </div>
                                                    <div class="field file">
                                                        <label>Select Agreement</label>
                                                        <input type="file" name="agreement" accept="application/pdf" required>
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
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Agreement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE removed = 0");
                                                    
                                                    while($row = mysqli_fetch_assoc($sql)){

                                                        $sql1 = mysqli_query($conn,"SELECT * FROM agreement WHERE user_id={$row['user_id']}");
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
                                                                        $fdate = date('d F Y', strtotime($row1['fdate']));
                                                                        $tdate = date('d F Y', strtotime($row1['tdate']));
                                                                        $file = "../files/".$row['user_id']."/agreement/".$row1['file'];
                                                                        echo '<td>'.$fdate.'</td>
                                                                                <td>'.$tdate.'</td>
                                                                                <td><button class="btn btn-primary" onclick = window.open("'.$file.'")>View</button></td>';
                                                                    }
                                                                    echo '</tr>';
                                                        }
                                                        if($user){
                                                            echo '<tr>
                                                                    <td>'.$row['name'].'</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
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
<script src="./js/agreement.js"></script>
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
