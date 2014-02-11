<?php

include_once($_SERVER['DOCUMENT_ROOT']."/admin-modules.inc.php");

$session->is_user("login");

include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/header.inc.php");

?>

<div id="content">
    <h1 class="home">Home</h1>
	<?php 
	
			if($session->get_permissions("ADMIN", "MODULES", "TASKS", false, false)){ 

				echo "<div class=\"homeCategory\">";
				echo "<h2>Statistics</h2>";
				echo "<ul>";
		
				if($session->get_permissions("ADMIN", "MODULES", "TASKS", "CREATE", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."stats/admin/tasks.php\" title=\"Tasks\">Tasks</a>\n
							<a href=\"".MAINURL."stats/admin/tasks-add.php\" title=\"Add Task\" class=\"addNav\">Add Task</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";
				}		
				if($session->get_permissions("ADMIN", "MODULES", "TASKS", "ASSIGN", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."stats/admin/tasks-assignment.php\" title=\"Task Assignments\">Task Assignments</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";		
					
				}
				if($session->get_permissions("ADMIN", "MODULES", "TASKS", "ENTRY", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."stats/admin/stats.php\">Statistics Data Entry</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";
				}
				if($session->get_permissions("ADMIN", "MODULES", "TASKS", "REPORTS", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."stats/admin/reports.php\" title=\"Statistics Reports\">Statistics Reports</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";		
				}
		
				echo "</ul>";	
				echo "</div>";
				
			}

			if($session->get_permissions("ADMIN", "MODULES", "MAINT", false, false)){ 
			
				echo "<div class=\"homeCategory\">";
				echo "<h2>Maintenance</h2>";
				echo "<ul>";
		
				if($session->get_permissions("ADMIN", "MODULES", "MAINT", "CREATE", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."maintenance/admin/maintenance.php\" title=\"Tasks\">Maintenance Types</a>\n
							<a href=\"".MAINURL."maintenance/admin/maintenance-add.php\" title=\"Add Maintenance Type\" class=\"addNav\">Add Maintenance Type</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";
				}		
		
				if($session->get_permissions("ADMIN", "MODULES", "MAINT", "ASSIGN", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."maintenance/admin/maintenance-assignment.php\" title=\"Maintenance Type Assignments\">Maintenance Type Assignments</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";		
					
				}

				if($session->get_permissions("ADMIN", "MODULES", "MAINT", "DEPARTMENTS", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."maintenance/admin/departments.php\" title=\"Tasks\">Maintenance Departments</a>\n
							<a href=\"".MAINURL."maintenance/admin/departments-add.php\" title=\"Add Maintenance Department\" class=\"addNav\">Add Maintenance Department</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";
				}
				
				if($session->get_permissions("ADMIN", "MODULES", "MAINT", "REQUESTS", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."maintenance/admin/requests.php\" title=\"Tasks\">Maintenance Requests</a>\n
							<a href=\"".MAINURL."maintenance/admin/requests-add.php\" title=\"Add Maintenance Request\" class=\"addNav\">Add Maintenance Request</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";
				}
		
				if($session->get_permissions("ADMIN", "MODULES", "MAINT", "REPORTS", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."maintenance/admin/reports.php\" title=\"Maintenance Reports\">Maintenance Reports</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";		
				}
				
				echo "</ul>";	
				echo "</div>";
				
			}
	
			if($session->get_permissions("ADMIN", "MODULES", "USERS", false, false)){ 
	
				echo "<div class=\"homeCategory\">";
				echo "<h2>Administrator</h2>";
				echo "<ul>";
		
				if($session->get_permissions("ADMIN", "MODULES", "USERS", "CREATE", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."users/admin/users.php\" title=\"\">Users</a>\n
							<a href=\"".MAINURL."users/admin/users-add.php\" title=\"Add User\" class=\"addNav\">Add User</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";
				}

				if($session->get_permissions("ADMIN", "MODULES", "USERS", "PROGRAMS", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."programs/admin/programs.php\">Programs</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";
				}
				
				if($session->get_permissions("ADMIN", "MODULES", "USERS", "BACKUP", false)){ 
					echo "<li>\n
							<a href=\"".MAINURL."users/admin/users-backup.php\" title=\"\">Database Backup</a>\n
							<div class=\"clear\"></div>\n
							</li>\n";
				}

				echo "</ul>";
				echo "</div>";

			}

	?>
    <div class="clear"></div>
</div>
<?php require($_SERVER['DOCUMENT_ROOT']."/template/admin/footer.inc.php"); ?>
