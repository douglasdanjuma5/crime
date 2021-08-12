<div class="span3">
					<div class="sidebar">


					<ul class="widget widget-menu unstyled">
					<li class="mt">
                      <a href="dashboard.php">
                          <i class="icon-task-cog"></i>
						  <span>Dashboard</span>
					
                      </a>
                  		</li>
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Manage Crimes
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<!-- <li>
										<a href="register-crime.php">
											<i class="icon-tasks"></i>
											Report Crimes
										
										</a>
									</li> -->


									<li>
										<a href="pending_crime.php">
											<i class="icon-tasks"></i>
											Pending Crimes
											<?php
											$rt = mysqli_query($con,"SELECT * FROM tblcrimes where status is null");
											$num1 = mysqli_num_rows($rt);
											{?>
		
											<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
											<?php } ?>
										</a>
									</li>
									
									<li>
										<a href="under_investigation.php">
											<i class="icon-tasks"></i>
											Crimes Under Investigation
                   <?php 
										$status="under investigation";                   
									$rt = mysqli_query($con,"SELECT * FROM tblcrimes where status='$status'");
									$num1 = mysqli_num_rows($rt);
									{?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
									<?php } ?>
										</a>
									</li>
									<li>
										<a href="closed_crime.php">
											<i class="icon-inbox"></i>
											Closed Crimes
													<?php 
											$status="closed";                   
										$rt = mysqli_query($con,"SELECT * FROM tblcrimes where status='$status'");
										$num1 = mysqli_num_rows($rt);
										{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
										<?php } ?>

										</a>
									</li>
								</ul>
							</li>
								<li>
								<a href="manage-admin.php">
									<i class="menu-icon icon-group"></i>
										Manage Admin
								</a>
							</li>
							<li>

								<a href="manage-users.php">
									<i class="menu-icon icon-group"></i>
									Manage users
								</a>
							</li>
						</ul>


						<ul class="widget widget-menu unstyled">
							<li><a href="category.php"><i class="menu-icon icon-tasks"></i> Add Category </a></li>
							<li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Add Sub-Category </a></li>
							<li><a href="security.php"><i class="menu-icon icon-paste"></i>Add Security Agency</a></li>
				
			
					</ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							<!-- <li><a href="user-logs.php"><i class="menu-icon icon-tasks"></i>User Login Log </a></li>
							 -->
							<!-- <li>
								<a href="user-logs.php">
									<i class="menu-icon icon-group"></i>
									Users Log
								</a>
							</li> -->
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
