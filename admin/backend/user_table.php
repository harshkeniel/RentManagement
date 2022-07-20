<?php
    require_once("../../includes/connection.php");
    $id = $_POST['id'];

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $id");
    $row = mysqli_fetch_assoc($sql);

    echo'
        <div class="row">
            <div class="col-md-6">
                <div class="profile-head">
                            <h4><i class="bi bi-person-circle"></i>
                                '.$row['name'].'
                            </h4>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="home" aria-selected="true">Breakdown</a>
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
                                <label>Name:</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row['name'].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email:</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row['email'].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone:</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row['phone'].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Adhar Card No:</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row['aadhar'].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Pan Card No:</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row['pan'].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Deposit:</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row['deposit'].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Rent:</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row['rent'].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Maintanance:</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row['maintenance'].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fine:</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row['fine'].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Light Bill:</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$_POST['amount'].'</p>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>'; 