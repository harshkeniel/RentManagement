<?php
    require_once("./backend/validation.php");
    include_once("../includes/header.php");
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

                                      <div class="container emp-profile">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="profile-head">
                                                                <h4><i class="bi bi-person-circle"></i>
                                                                <?php echo $rown['name'];?>
                                                                </h4>
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-8">
                                                    <div class="tab-content profile-tab" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                                
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Email:</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><?php echo $rown['email'];?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Phone:</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><?php echo $rown['phone'];?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Aadhar Card No:</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><?php echo $rown['aadhar'];?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Pan Card No:</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><?php echo $rown['pan'];?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="container">
                                                                        <button type="button" class="btn btn-info" data-target="#exampleModal" data-toggle="modal">Change Password</button>
                                                                        </div>

                                                                    <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form>
                                                                                    <div class="error-text" style="color: #721c24;
                                                                                                                    background-color: #f8d7da;
                                                                                                                    margin-bottom: 10px;
                                                                                                                    padding: 8px 10px;
                                                                                                                    border-radius: 5px;
                                                                                                                    text-align: center;
                                                                                                                    font-size: 16px !important;
                                                                                                                    border: 1px solid #f5c6cb;
                                                                                                                    display: none;">This is an error message!!</div>
                                                                                    <div class="mb-3">
                                                                                        <label for="cpassword" class="col-form-label">Current Password:</label>
                                                                                        <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Enter your current password">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="npassword" class="col-form-label">New Password:</label>
                                                                                        <input type="password" class="form-control" name="npassword" id="npassword" placeholder="Enter your new password">
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>


                                                                    

                                                                    </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Deposit:</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><?php echo $rown['deposit'];?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Rent:</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><?php echo $rown['rent'];?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Maintenance:</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><?php echo $rown['maintenance'];?></p>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Fine:</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><?php //echo $rown['fine'];?></p>
                                                                        </div>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>           
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
<script src="./js/profile.js"></script>
<?php
    include_once("../includes/scripts.php");
?>   
</body>

</html>
