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
                                              <header>Add New Member</header>
                                              <form action="#" enctype="multipart/form-data">
                                                <div id="error-text" class="error-text">This is an error message!!</div>
                                                <div class="name-details">
                                                  <div class="field input">
                                                    <label>First Name</label>
                                                    <input type="text" name="fname" id="fname" pattern="[A-Za-z]+" placeholder="First name" required>
                                                  </div>
                                                  <div class="field input">
                                                    <label>Last Name</label>
                                                    <input type="text" name="lname" id="lname" pattern="[A-Za-z]+" placeholder="Last name" required>
                                                  </div>
                                                </div>
                                                <div class="field input">
                                                  <label>Email Address</label>
                                                  <input type="email" name="email" placeholder="Enter Email" required>
                                                  <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="field input">
                                                    <label>Phone Number</label>
                                                    <input type="text" name="pnumber" id="pnumber" placeholder="Enter Phone Number" required>
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                                <div class="field input">
                                                    <label>Aadhar Number</label>
                                                    <input type="text" name="anumber" id="anumber" placeholder="Enter Aadhar Number" required>
                                                    <i class="fas fa-fingerprint"></i>
                                                  </div>
                                                <div class="field input">
                                                    <label>Pan Number</label>
                                                    <input type="text" name="pannumber" id="pannumber" placeholder="Enter Pan Number" required>
                                                    <i class="fas fa-id-card"></i>
                                                </div>
                                                <div class="field button">
                                                  <input type="submit" name="submit" value="Add Member">
                                                </div>
                                              </form>
                                          </section>  
                                        </div>

                                        <div class="table_wrapper" style="margin-top:40px;"> 
                                        <table id="table_id" class="user_table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Aadhar</th>
                                                    <th>Pan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $id = $_SESSION['USER_ID']; 
                                                    $sql = mysqli_query($conn,"SELECT * FROM member");
                                                    while($row = mysqli_fetch_assoc($sql)){
                                                        echo '<tr>
                                                              <td>'.$row['name'].'</td>
                                                              <td>'.$row['phone'].'</td>
                                                              <td>'.$row['email'].'</td>
                                                              <td>'.$row['aadhar'].'</td>
                                                              <td>'.$row['pan'].'</td>';

                                                              if($row['status']==0){  
                                                                  echo '<td><span class="label label-warning" style="font-size:inherit;">PENDING</span></td>';
                                                              }
                                                              else if($row['status']==1){
                                                                  echo '<td><span class="label label-success" style="font-size:inherit;">APPROVED</span></td>';
                                                              }
                                                              else{
                                                                  echo '<td><span class="label label-danger" style="font-size:inherit;">DISAPPROVED</span></td>';
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
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>';
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
</body>

</html>
