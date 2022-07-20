<?php
    require_once("./backend/validation.php");
    require_once("../includes/connection.php");
    $sqln = mysqli_query($conn,"SELECT * FROM user WHERE user_id={$_SESSION['USER_ID']} ");
    $rown = mysqli_fetch_assoc($sqln);
    $name = explode(" ", $rown['name']);
    $name = $name[0];

    //notification logic
    $sqln1 = mysqli_query($conn,"SELECT * FROM notice ORDER BY date DESC");
    $rown1 = mysqli_fetch_assoc($sqln1);
    $daten = date('Y-m-d',strtotime("-2 days"));
    $span = "";
    if($rown1==null){
        $span = '';
    }
    else if($rown1['date']>=$daten){
        $span = '<span class="badge bg-c-pink"></span>';
    }

?>    
            <!-- Pre-loader start -->
           <div class="theme-loader">
               <div class="loader-track">
                   <div class="loader-bar"></div>
               </div>
           </div>
           <!-- Pre-loader end -->
           <div id="pcoded" class="pcoded">
               <div class="pcoded-overlay-box"></div>
               <div class="pcoded-container navbar-wrapper">
       
                   <nav class="navbar header-navbar pcoded-header">
                      <div class="navbar-wrapper">
                          <div class="navbar-logo">
                          
                              <a class="mobile-menu" id="mobile-collapse" href="#!">
                                  <i class="ti-menu" id="menu-open" hidden></i>
                                  <i class="ti-close" id="menu-close"></i>
                              </a>
                              
                              <a class="mobile-options">
                                  <i class="ti-more"></i>
                              </a>
                              
                          </div>
                          <div class="navbar-welcome">
                            <a href="">
                                    <p>Welcome <?php echo $name; ?></p>
                                </a>
                          </div>
                          <div class="navbar-container container-fluid">
                              <ul class="nav-right">
                                  <li>
                                      <a href="notice_board.php">
                                          <i class="ti-bell"></i>
                                          <?php echo $span ;?>
                                      </a>
                                  </li>
                                  
                                  <li class="user-profile header-notification">
                                      <a href="#!">
                                          <img src="../assets/images/person-circle.svg" style="filter:invert(0.8);height: 35px;" class="img-radius" alt="User-Profile-Image">
                                          <span><?php echo $name; ?></span>
                                          <i class="ti-angle-down"></i>
                                      </a>
                                      <ul class="show-notification profile-notification">
                                          
                                          <li>
                                              <a href="profile.php">
                                                  <i class="ti-user"></i> Profile
                                              </a>
                                          </li>
                                          
                                          <li>
                                              <a href="backend/logout.php">
                                              <i class="ti-layout-sidebar-left"></i> Logout
                                          </a>
                                          </li>
                                      </ul>   
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </nav>
                   <div class="pcoded-main-container">
                       <div class="pcoded-wrapper">
                           <nav class="pcoded-navbar">
                               <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                               <div class="pcoded-inner-navbar main-menu">
                                   
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-dashboard">
                                           <a href="dashboard.php">
                                               <span class="pcoded-micon"><i class="bi bi-card-list"></i><b></b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-member">
                                           <a href="member.php">
                                               <span class="pcoded-micon"><i class="bi bi-person-lines-fill"></i><b></b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.dash.main">Member</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-bills">
                                           <a href="bills.php">
                                               <span class="pcoded-micon"><i class="bi bi-lightning-fill"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Light Bill</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-payment">
                                           <a href="payment.php">
                                               <span class="pcoded-micon"><i class="bi bi-cash-stack"></i><b></b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.dash.main">Payment</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-feedback">
                                           <a href="feedback.php">
                                               <span class="pcoded-micon"><i class="bi bi-chat-square-text-fill"></i><b>D</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Feedback</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-files">
                                           <a href="files.php">
                                               <span class="pcoded-micon"><i class="bi bi-file-earmark-arrow-up-fill"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Files</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-notice-board">
                                           <a href="notice_board.php">
                                               <span class="pcoded-micon"><i class="bi bi-inboxes-fill"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Notice Board</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>                        
                               </div>
                           </nav>