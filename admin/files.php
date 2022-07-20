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
                                        <header>Download Files</header>
                                        <table id="table_id" class="user_table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Light Bill</th>
                                                    <th>Light Bill Receipt</th>
                                                    <th>Agreement</th>
                                                    <th>Property Tax</th>
                                                    <th>Property Tax Receipt</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE removed = 0");

                                                    while($row = mysqli_fetch_assoc($sql)){
                                                        
                                                        $lb = glob("../files/".$row['user_id']."/lightbill/*.*");
                                                        $lbr = glob("../files/".$row['user_id']."/lightbill/receipt/*.*");
                                                        $agr = glob("../files/".$row['user_id']."/agreement/*.*");
                                                        $pt = glob("../files/".$row['user_id']."/propertyTax/*.*");
                                                        $ptr = glob("../files/".$row['user_id']."/propertyTax/receipt/*.*");

                                                        echo '<tr>
                                                                <td>'.$row['name'].'</td>';
                                                        if($lb==[]){
                                                            echo '<td style="color:red;font-weight:bold;">No files</td>';
                                                        }
                                                        else{
                                                            echo '<td><button class="btn btn-primary" onclick=downloadzip("lb",'.$row['user_id'].',this)>Download All</button></td>';
                                                        }
                                                        if($lbr==[]){
                                                            echo '<td style="color:red;font-weight:bold;">No files</td>';
                                                        }
                                                        else{
                                                            echo '<td><button class="btn btn-primary" onclick=downloadzip("lbr",'.$row['user_id'].',this)>Download All</button></td>';
                                                        }
                                                        if($agr==[]){
                                                            echo '<td style="color:red;font-weight:bold;">No files</td>';
                                                        }
                                                        else{
                                                            echo '<td><button class="btn btn-primary" onclick=downloadzip("agr",'.$row['user_id'].',this)>Download All</button></td>';
                                                            
                                                        }
                                                        if($pt==[]){
                                                            echo '<td style="color:red;font-weight:bold;">No files</td>';
                                                        }
                                                        else{
                                                            echo '<td><button class="btn btn-primary" onclick=downloadzip("pt",'.$row['user_id'].',this)>Download All</button></td>';
                                                            
                                                        }
                                                        if($ptr==[]){
                                                            echo '<td style="color:red;font-weight:bold;">No files</td>';
                                                        }
                                                        else{
                                                            echo '<td><button class="btn btn-primary" onclick=downloadzip("ptr",'.$row['user_id'].',this)>Download All</button></td>';
                                                            
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
<script src="./js/files.js"></script>
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
