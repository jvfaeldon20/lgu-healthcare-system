<?php // function to get the current page name
function PageName() {
  return substr( $_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/") +1);
}

$current_page = PageName();
?>
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            
            <ul class="nav nav-primary">
                <!-- dashboard -->
                <li class="nav-item <?= $current_page=='dashboard.php' ? 'active' : null ?>">
                    <a href="dashboard.php" >
                        <i class="fas fa-bullhorn"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- end of dashboard -->


                <!-- medical consumables -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MEDICAL CONSUMABLES</h4>
                </li>
                        <!-- medicine -->
                        <li class="nav-item <?= $current_page=='medicine.php' || $current_page=='medicine_add_form.php'  || $current_page=='medicine_update_form.php' ? 'active' : null ?>">
                            <a href="medicine.php" >
                                <i class="fas fa-pills"></i>
                                <p>Medicine</p>
                            </a>
                        </li>
                        <!-- medical supplies -->
                        <li class="nav-item <?= $current_page=='supplies.php' || $current_page=='supplies_update_form.php' || $current_page=='supplies_add_form.php' ? 'active' : null ?>">
                            <a href="supplies.php" >
                                <i class="fas fa-medkit"></i>
                                <p>Medical Supplies</p>
                            </a>
                        </li>
                <!-- end of medical consumables -->


                
                
                <!-- appointments -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">APPOINTMENTS</h4>
                </li>
                        <!-- create appointment -->
                        <li class="nav-item <?= $current_page=='appointment.php' || $current_page=='appointment_detail.php' || $current_page=='appointment_add_form.php' || $current_page=='appointment_update_form.php' ? 'active' : null ?>">
                            <a href="appointment.php" >
                                <i class="fas fa-pills"></i>
                                <p>Appointment</p>
                            </a>
                        </li>



                <!-- our barangay -->
                <?php if(isset($_SESSION['username']) && $_SESSION['role']!='medical-admin'): ?>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">OUR BARANGAY</h4>
                </li>
                        <!-- staffs and officials -->
                        <li class="nav-item <?= $current_page=='officials.php' ? 'active' : null ?>">
                            <a href="officials.php" >
                            <i class="fa fa-users"></i>
                                <p>Staff and Officials</p>
                            </a>
                        </li>
                        <!-- barangay info -->
                        <li class="nav-item <?= $current_page=='barangay-info.php' ? 'active' : null ?>">
                            <a href="barangay-info.php" >
                                <i class="fa fa-info"></i>
                                <p>Barangay Info</p>
                            </a>
                        </li>
                        <?php endif ?>
                <!-- end of barangay -->
               

                
                <!-- system maintenance -->
                <?php if(isset($_SESSION['username']) && $_SESSION['role']=='system-maintenance'): ?>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">SYSTEM MAINTENANCE</h4>
                </li>
                        <!-- resident -->
                        <li class="nav-item <?= $current_page=='resident.php' ? 'active' : null ?>">
                            <a href="resident.php" >
                            <i class="fa fa-users"></i>
                                <p>Residents</p>
                            </a>
                        </li>
                        <!-- manage users -->
                        <li class="nav-item <?= $current_page=='manage-user.php' ? 'active' : null ?>">
                            <a href="manage-user.php" >
                                <i class="fa fa-server"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <!-- reports -->
                        <li class="nav-item <?= $current_page=='download-reports.php' ? 'active' : null ?>">
                            <a href="download-reports.php" >
                                <i class="fa fa-print"></i>
                                <p>Download Reports</p>
                            </a>
                        </li>
                        <?php endif ?>
                <!-- end of system maintenance -->


                <!-- sign out -->
                <li class="nav-item fixed-bottom">
                        <?php if(isset($_SESSION['role'])):?>
                            <a href="model/logout.php">
                                <i class="icon-logout"></i>
                                <p>Logged as <span class='text-primary'><?php echo $_SESSION['username']; ?></span></p>
                            </a>
                        <?php endif ?>
                </li>
                <!-- end of sign out -->

            </ul>

        </div>
    </div>
</div>