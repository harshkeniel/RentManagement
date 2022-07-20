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
                                                <header>Remove User</header>
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
                                                    <div class="field button">
                                                    <input type="submit" name="submit" value="Remove">
                                                    </div>
                                                </form>
                                            </section>  
                                        </div>  
                                        <div class="table_wrapper" style="margin-top:40px;"> 
                                        <table id="table_id" class="user_table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE removed = 1");
                                                    
                                                    while($row = mysqli_fetch_assoc($sql)){
                                                        $user = false;
                                                        echo '<tr>
                                                                <td>'.$row['user_id'].'</td>
                                                                <td>'.$row['name'].'</td>';
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
<script src="./js/remove_user.js"></script>
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
