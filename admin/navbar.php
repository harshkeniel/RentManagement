<?php
    if(!isset($_SESSION['ID'])){
        header("location: index.php");
    }
    require_once("../includes/connection.php");
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
                                    <p>Welcome Admin</p>
                                </a>
                          </div>
                          <div class="navbar-container container-fluid">
                              <ul class="nav-right">
                                  
                                  <li class="user-profile header-notification">
                                      <a href="#!">
                                          <img src="../assets/images/person-circle.svg" style="filter:invert(0.8);height: 35px;" class="img-radius" alt="User-Profile-Image">
                                          <span>Admin</span>
                                          <i class="ti-angle-down"></i>
                                      </a>
                                      <ul class="show-notification profile-notification">
                                          
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
                                       <li id="menu-create-user">
                                           <a href="create_user.php">
                                               <span class="pcoded-micon"><i class="bi bi-people"></i><b></b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.dash.main">Create User</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-update">
                                           <a href="update.php">
                                               <span class="pcoded-micon"><i class="bi bi-upload"></i><b>D</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Update</span>
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
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-property">
                                           <a href="property.php">
                                               <span class="pcoded-micon"><i class="bi bi-file-earmark-ppt-fill"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Property Tax</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-agreement">
                                           <a href="agreement.php">
                                               <span class="pcoded-micon"><i class="bi bi-file-earmark-person"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Agreement</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-verification">
                                           <a href="police_verification.php">
                                               <span class="pcoded-micon"><i class="fa fa-id-badge"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Police Verification</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-extra-charges">
                                           <a href="extra_charges.php">
                                               <span class="pcoded-micon"><i class="fa fa-rupee-sign"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Extra Charges</span>
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
                                       <li id="menu-user-table">
                                           <a href="user_table.php">
                                               <span class="pcoded-micon"><i class="bi bi-person-lines-fill"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Users Table</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-member-table">
                                           <a href="member_table.php">
                                               <span class="pcoded-micon"><i class="bi bi-person-plus-fill"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Members Table</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-feedback">
                                           <a href="feedback.php">
                                               <span class="pcoded-micon"><i class="bi bi-chat-square-text-fill"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Feedback</span>
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
                                   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                                   <ul class="pcoded-item pcoded-left-item">
                                       <li id="menu-remove-user">
                                           <a href="remove_user.php">
                                               <span class="pcoded-micon"><i class="bi bi-person-x"></i><b>FC</b></span>
                                               <span class="pcoded-mtext" data-i18n="nav.form-components.main">Remove User</span>
                                               <span class="pcoded-mcaret"></span>
                                           </a>
                                       </li>
                                   </ul>                        
                               </div>
                           </nav>