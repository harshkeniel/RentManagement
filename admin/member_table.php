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
                                        <header>Member's Table</header>
                                        <table id="table_id" class="user_table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>User Name</th>
                                                    <th>Member Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Aadhar</th>
                                                    <th>Pan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                    $sql = mysqli_query($conn,"SELECT * FROM member");
                                                    while($row = mysqli_fetch_assoc($sql)){
                                                        $sql1 = mysqli_query($conn, "SELECT * FROM user WHERE user_id = {$row['user_id']}");
                                                        $row1 = mysqli_fetch_assoc($sql1);
                                                        echo '<tr>
                                                              <td>'.$row['user_id'].'</td>
                                                              <td>'.$row1['name'].'</td>
                                                              <td>'.$row['name'].'</td>
                                                              <td>'.$row['phone'].'</td>
                                                              <td>'.$row['email'].'</td>
                                                              <td>'.$row['aadhar'].'</td>
                                                              <td>'.$row['pan'].'</td>';

                                                              if($row['status']==1){
                                                                  echo '<td><span class="label label-success" style="font-size:inherit;">APPROVED</span></td>';
                                                              }
                                                              else if($row['status']==2){
                                                                  echo '<td><span class="label label-danger" style="font-size:inherit;">DISAPPROVED</span></td>';
                                                              }
                                                              else{
                                                                  echo '<td>
                                                                        <button class="btn btn-info btn-round btn-sm m-l-5" onclick="approve('.$row['id'].')">Approve</button>
                                                                        <button class="btn btn-danger btn-round btn-sm m-l-5" onclick="disapprove('.$row['id'].')">Disapprove</button>
                                                                        </td>';
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
<script src="./js/member.js"></script>
<?php
    include_once("../includes/scripts.php");
?> 
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );   
</script>          
</body>

</html>
