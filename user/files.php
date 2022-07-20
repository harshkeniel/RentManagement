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
                                        
                                            <!-- tabs card start -->
                                            <div class="col-sm-12">
                                                <div class="card tabs-card">
                                                    <div class="card-block p-0">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs md-tabs" role="tablist" style="justify-content: space-evenly;">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#profile3" role="tab" style="font-size: 16px;"><i class="bi bi-file-earmark-person"></i>Agreement</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#home3" role="tab" style="font-size: 16px;"><i class="bi bi-file-earmark-ppt-fill"></i>Property Tax</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                        </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content card-block">
                                                            
                                                            <div class="tab-pane active" id="profile3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table id="table_id1" class="user_table table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>From</th>
                                                                                <th>To</th>
                                                                                <th>Agreement</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                                $id = $_SESSION['USER_ID']; 
                                                                                $sql = mysqli_query($conn,"SELECT * FROM agreement WHERE user_id=$id");
                                                                                $user = true;
                                                                                while($row = mysqli_fetch_assoc($sql)){
                                                                                    $user = false;
                                                                                    echo '<tr>';
                                                                                    $fdate = date('d F Y', strtotime($row['fdate']));
                                                                                    $tdate = date('d F Y', strtotime($row['tdate']));
                                                                                    $file = "../files/".$id."/agreement/".$row['file'];
                                                                                    echo '<td>'.$fdate.'</td>
                                                                                            <td>'.$tdate.'</td>
                                                                                            <td><button class="btn btn-primary" onclick = window.open("'.$file.'")>View</button></td>';
                                                                                    echo '</tr>';
                                                                                }
                                                                                if($user){
                                                                                    echo '<tr>
                                                                                            <td colspan="3" style="color:#17A2B8;font-weight:bold;">No Data Available</td>
                                                                                            </tr>';
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane" id="home3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                <table id="table_id2" class="user_table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Date</th>
                                                                            <th>Property Tax</th>
                                                                            <th>Receipt</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                            $id = $_SESSION['USER_ID']; 
                                                                            $sql = mysqli_query($conn,"SELECT * FROM propertytax WHERE user_id=$id");
                                                                            $user = true;
                                                                            while($row = mysqli_fetch_assoc($sql)){
                                                                                $user = false;
                                                                                echo '<tr>';
                                                                                        if(empty($row['file'])){  
                                                                                            echo '<td>-</td>
                                                                                                    <td style="color:red;font-weight:bold;">FILE NOT UPLOADED</td>
                                                                                                    <td style="color:red;font-weight:bold;">FILE NOT UPLOADED</td>'; 
                                                                                        }
                                                                                        else{
                                                                                            $date = date('F Y', strtotime($row['date']));
                                                                                            $file = "../files/".$id."/propertyTax/".$row['file'];
                                                                                            echo '<td>'.$date.'</td>
                                                                                                    <td><button class="btn btn-primary" onclick = window.open("'.$file.'")>View</button></td>';
                                                                                            if(empty($row['receipt'])){
                                                                                                echo '<td style="color:red;font-weight:bold;">FILE NOT UPLOADED</td>';
                                                                                            }
                                                                                            else{
                                                                                                $file = "../files/".$id."/propertyTax/receipt/".$row['receipt'];
                                                                                                echo '<td><button class="btn btn-primary" onclick = window.open("'.$file.'")>View</button></td>';
                                                                                            }        
                                                                                        }
                                                                                        echo '</tr>';
                                                                            }
                                                                            if($user){
                                                                                echo '<tr>
                                                                                        <td colspan="3" style="color:#17A2B8;font-weight:bold;">No Data Available</td>
                                                                                        </tr>';
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
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>';
<script>
    $(document).ready( function () {
        $('#table_id1').DataTable();
    } );
    $(document).ready( function () {
        $('#table_id2').DataTable();
    } );
</script>  
</body>

</html>
