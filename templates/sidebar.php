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
                        <?php if(isset($_SESSION['username']) && $_SESSION['role'] == 'resident'): ?>
                        <!-- medicine -->
                        <li class="nav-item <?= $current_page=='medicine-list.php' ? 'active' : null ?>">
                            <a href="medicine-list.php" >
                                <i class="fas fa-pills"></i>
                                <p>Medicine</p>
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if(isset($_SESSION['username']) && $_SESSION['role'] != 'resident'): ?>
                        <!-- medicine inventory -->
                        <li class="nav-item <?= $current_page=='medicine-inventory.php' ? 'active' : null ?>">
                            <a href="medicine-inventory.php" >
                                <i class="fas fa-pills"></i>
                                <p>Medicine Inventory</p>
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if(isset($_SESSION['username']) && $_SESSION['role'] == 'resident'): ?>
                        <!-- medical supplies -->
                        <li class="nav-item <?= $current_page=='medical-supplies.php' ? 'active' : null ?>">
                            <a href="medical-supplies.php" >
                                <i class="fas fa-medkit"></i>
                                <p>Medical Supplies</p>
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if(isset($_SESSION['username']) && $_SESSION['role'] != 'resident'): ?>
                        <!-- medical supplies -->
                        <li class="nav-item <?= $current_page=='medical-supplies-inventory.php' ? 'active' : null ?>">
                            <a href="medical-supplies-inventory.php" >
                                <i class="fas fa-medkit"></i>
                                <p>Med Supplies Inventory</p>
                            </a>
                        </li>
                        <?php endif ?>
                <!-- end of medical consumables -->


                
                
                <!-- appointments -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">APPOINTMENTS</h4>
                </li>
                        <?php if(isset($_SESSION['username']) && $_SESSION['role']=='resident'): ?>
                        <!-- create appointment -->
                        <li class="nav-item <?= $current_page=='create-appointment.php' ? 'active' : null ?>">
                            <a href="create-appointment.php" >
                                <i class="fas fa-pills"></i>
                                <p>Create Appointment</p>
                            </a>
                        </li>
                        <?php endif ?>
                        <!-- check appointment -->
                        <?php if(isset($_SESSION['username']) && $_SESSION['role'] != 'resident'): ?>
                        <li class="nav-item <?= $current_page=='check-appointment.php' ? 'active' : null ?>">
                            <a href="check-appointment.php" >
                                <i class="fas fa-medkit"></i>
                                <p>Check Appointment</p>
                            </a>
                        </li>
                        <?php endif ?>
                <!-- end of appointments -->



                <!-- our barangay -->
                <?php if(isset($_SESSION['username']) && $_SESSION['role']=='resident'): ?>
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
                    <div class="fixed-bottom">
                            <?php if(isset($_SESSION['role'])):?>
                                <a href="model/logout.php">
                                    <i class="icon-logout"></i>
                                    <p>Sign Out</p>
                                </a>
                            <?php endif ?>
                    </div>
                </li>
                <!-- end of sign out -->

            </ul>

        </div>
    </div>
</div>