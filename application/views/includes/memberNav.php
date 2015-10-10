<!--logo start-->
            <a href="<?php echo base_url(); ?>profile" class="logo" style="font-weight:bold; ">MEGASIGN</a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notification dropdown start-->
                <ul class="nav pull-right top-menu">                    
                    <!-- inbox notification start-->
                    <li id="mail_notification_bar" class="dropdown">
                    <?php if($notif_m_ctr != 0){ ?>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="icon_mail_alt"></i>
						<span class="badge bg-important"><?php echo $notif_m_ctr; ?></span>
                    </a>
					<ul class="dropdown-menu extended inbox">
						<div class="notify-arrow notify-arrow-custom"></div>
						<li>
							<p class="custom">You have <?php echo $notif_m_ctr; ?> new messages</p>
						</li>
						<?php foreach($nmsgs as $row):?>
						<li>
								<a href="<?php echo base_url()?>messages/read/<?php echo $row['message_id']?>">
									<span class="subject">
	                                    <span class="from"><?php echo $row['sender']?></span>
	                                    
	                                    <?php $currentD = date('m d');/*01 to 12 & 01 to 31*/
	                                    	  $current_h = date('H'); /*00 to 23*/
											  $current_m = date('i'); /* 00 to 59*/
											  $currentT = date('H:i');
											  $current_d = date('d');
											    
											  $sentD = date('m d', strtotime($row['date_sent']));
										 	  $sent_h = date('H',strtotime($row['date_sent']));
											  $sent_m = date('i',strtotime($row['date_sent']));  
											  $sentT = date('H:i',strtotime($row['date_sent']));
											  $sent_d = date('d', strtotime($row['date_sent']));
											  
										 if($currentD == $sentD && $currentT == $sentT){?>
	                                   		<span class="time"> &lt; a minute ago </span> 
	                                   	 <?php }
										 else if($currentD == $sentD && $current_h >= $sent_h){
	                                   	 		$h_passed = ($current_h - $sent_h) - 1; 
	                                   	 		if($h_passed <= 0 && $current_m < $sent_m ){
	                                   	 			$m_passed = (60 - $current_m) - (60 - $sent_m);
													$total = 60 - $m_passed;
	                                   	 			?>
													<span class="time"><?php if($total > '2'){?> 1 minute ago</span><?php }else{ echo $total ?> minutes ago </span> <?php }
	                                   	 		}
												else if($h_passed <= 0 && $current_m > $sent_m ){
	                                   	 			$m_passed = $current_m - $sent_m;
	                                   	 			?>
													<span class="time"><?php if($h_passed == '0'){?> 1 hour ago</span><?php }else{ echo $m_passed ?> minutes ago </span> <?php }
	                                   	 		}
	                                   	 		else if($h_passed >= 1 && $current_m > $sent_m ){ 
	                                   	 			$m_passed = $current_m - $sent_m;
	                                   	 			?>
	                                   				<span class="time"><?php echo $h_passed+1 ?> hours ago </span><?php  
												}
	                                   	 }
										 else if($currentD == $sentD && $current_h >= $sent_h){
	                                   	 		$h_passed = ($current_h - $sent_h); ?>
	                                   			<span class="time"><?php if($h_passed == '1'){?> 1 hour ago</span><?php }else{ echo $h_passed ?> hours ago </span><?php } 
										 }
	                                   	 else if($currentD > $sentD && $current_h < 23 && $current_m < 59){?>
	                                   			<span class="time"> more than a day ago</span>
	                                   	 <?php } ?>
	                                   	 
                                    </span>
                                    <span class="message">
                                        <?php echo htmlspecialchars($row['peak'], ENT_COMPAT | ENT_HTML5, 'UTF-8');?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php }
						else {
					?>
                    	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon_mail_alt"></i>
                        </a>
                        <ul class="dropdown-menu extended inbox">
							<div class="notify-arrow notify-arrow-custom"></div>
							 <li>
                                <p class="custom">You have no new messages</p>
                            </li>

                        	<li>
                                <a href="<?php echo base_url()?>messages">See all messages</a>
                            </li>
                        	</ul>
                    	</li>
                    <?php } ?>
                    <!-- inbox notification end -->
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        	<?php foreach ($log as $r)?>
                            <span class="username"><?php echo $r->firstName ?> <?php echo $r->lastName ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="notify-arrow notify-arrow-custom"></div>
                            <li class="eborder-top">
                                <a href="<?php echo base_url()?>dashboard"><i class="icon_laptop"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>profile"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>messages"><i class="icon_mail_alt"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>products"><i class="icon_cart_alt"></i> Products</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>profile/logout"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notification dropdown end-->
            </div>
      </header>      
      <!--header end-->