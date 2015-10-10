 <?php
	
	$head = $this->uri->segment('1');
	if($head == 'dashboard' || $head == 'profile')
	{ ?>
		
	<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?php echo base_url()?>dashboard">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                   
                   
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_cart"></i>
                          <span>Products</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <?php if(!empty($cat)){
			                        if (is_array($cat)){                      
			                          foreach ($cat as $row) {?>
			                          	<li><a href="<?php echo base_url()?>products/<?php echo $row['category_ID']?>"><?php echo $row['category_Name']; ?></a></li>
			                <?php } } }else{?>
		                      			<li></li>
		            		<?php }?>   
                      </ul>
                  </li>       
                  <li>
                      <a class="" href="<?php echo base_url();?>users">
                          <i class="icon_group"></i>
                          <span>Users</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="<?php echo base_url();?>messages">
                          <i class="icon_mail"></i>
                          <span>Mail</span>
                      </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
<?php } ?>


<?php
	
	$head = $this->uri->segment('1');
	if($head == 'products')
	{ ?>
		
		<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="">
                      <a class="" href="<?php echo base_url()?>dashboard">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                   
                   
				  <li class="active">
                      <a href="javascript:;" class="">
                          <i class="icon_cart"></i>
                          <span>Products</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                           <?php if(!empty($cat)){
			                        if (is_array($cat)){                      
			                          foreach ($cat as $row) {?>
			                          	<li><a href="<?php echo base_url()?>products/<?php echo $row['category_ID']?>"><?php echo $row['category_Name']; ?></a></li>
			                <?php } } }else{?>
		                      			<li></li>
		            		<?php }?>                         
                      </ul>
                  </li>       
                  <li>
                      <a class="" href="<?php echo base_url();?>users">
                          <i class="icon_group"></i>
                          <span>Users</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="<?php echo base_url();?>messages">
                          <i class="icon_mail"></i>
                          <span>Mail</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
<?php } ?>

<?php
	
	$head = $this->uri->segment('1');
	if($head == 'users')
	{ ?>
		
		<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="">
                      <a class="" href="<?php echo base_url()?>dashboard">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                   
                   
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_cart"></i>
                          <span>Products</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
					   <?php if(!empty($cat)){
			                        if (is_array($cat)){                      
			                          foreach ($cat as $row) {?>
			                          	<li><a href="<?php echo base_url()?>products/<?php echo $row['category_ID']?>"><?php echo $row['category_Name']; ?></a></li>
			                <?php } } }else{?>
		                      			<li></li>
		            		<?php }?>   
                      </ul>
                  </li>       
                  <li class="active">
                      <a class="" href="<?php echo base_url();?>users">
                          <i class="icon_group"></i>
                          <span>Users</span>
                      </a>
                  </li>
				  <li>
                      <a class="" href="<?php echo base_url();?>messages">
                          <i class="icon_mail"></i>
                          <span>Mail</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
<?php } ?>

 <?php
	
	$head = $this->uri->segment('1');
	if($head == 'messages')
	{ ?>
		
	<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li>
                      <a class="" href="<?php echo base_url()?>dashboard">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                   
                   
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_cart"></i>
                          <span>Products</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <?php if(!empty($cat)){
			                        if (is_array($cat)){                      
			                          foreach ($cat as $row) {?>
			                          	<li><a href="<?php echo base_url()?>products/<?php echo $row['category_ID']?>"><?php echo $row['category_Name']; ?></a></li>
			                <?php } } }else{?>
		                      			<li></li>
		            		<?php }?>   
                      </ul>
                  </li>       
                  <li>
                      <a class="" href="<?php echo base_url();?>users">
                          <i class="icon_group"></i>
                          <span>Users</span>
                      </a>
                  </li>
                  <li class="active">
                      <a class="" href="<?php echo base_url();?>messages">
                          <i class="icon_mail"></i>
                          <span>Mail</span>
                      </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
<?php } ?>