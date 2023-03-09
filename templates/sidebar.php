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
                <li class="nav-item <?= $current_page=='dashboard.php' || $current_page=='dashboard_announcement_detail.php' ? 'active' : null ?>">
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
                        <!-- barangay officials -->
                        <li class="nav-item <?= $current_page=='officials.php' ? 'active' : null ?>">
                            <a href="officials.php" >
                            <i class="fa fa-users"></i>
                                <p>Brgy Officials</p>
                            </a>
                        </li>
                        <!-- barangay info -->
                        <li class="nav-item <?= $current_page=='barangay-info.php' ? 'active' : null ?>">
                            <a href="barangay-info.php" >
                                <i class="fa fa-info"></i>
                                <p>Barangay Map</p>
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
                        <!-- manage announcement -->
                        <li class="nav-item <?= $current_page=='announcement.php' || $current_page=='announcement_detail.php' || $current_page=='announcement_update_form.php' || $current_page=='announcement_add_form.php' ? 'active' : null ?>">
                            <a href="announcement.php" >
                                <i class="fas fa-podcast"></i>
                                <p>Announcement</p>
                            </a>
                        </li>
                        <!-- manage users -->
                        <li class="nav-item <?= $current_page=='manage-user.php' || $current_page=='manage_user_add_form.php' ? 'active': null ?>">
                            <a href="manage-user.php" >
                                <i class="fa fa-server"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <!-- resident -->
                        <li class="nav-item <?= $current_page=='resident.php' || $current_page=='resident_add_form.php' || $current_page=='resident_update_form.php' ? 'active' : null ?>">
                            <a href="resident.php" >
                            <i class="fa fa-users"></i>
                                <p>Residents</p>
                            </a>
                        </li>
                        <!-- manage backup -->
                        <li class="nav-item <?= $current_page=='manage_backup.php' ? 'active' : null ?>">
                            <a href="manage_backup.php" >
                                <i class="fa fa-database"></i>
                                <p>Manage Backup</p>
                            </a>
                        </li>
                        <?php endif ?>
                <!-- end of system maintenance -->


                <!-- sign out -->
                <li class="nav-item " style="position: absolute;bottom: 0; display: inline-block;">
                    <a href="model/logout.php">
                        <i class="icon-logout"></i>
                        <p>Logged as <span class='text-primary'><?php echo $_SESSION['username']; ?></span></p>
                    </a>
                </li>
                <!-- end of sign out -->

            </ul>
        </div>
    </div>
</div>
<style>
    .sidebar.sidebar-style-2 .nav.nav-primary > .nav-item.active > a {
        background-color: lightseagreen !important;
    }
</style>