<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
	<ul class="sidebar-header">
		<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/kb_logo.jpg">
	</ul>        	
    <ul class="nav sidebar-nav">
    	<li><a href="<?php echo base_url()?>">Home</a></li>
    	<li><a href="<?php echo base_url()?>requests">Requests</a></li>
    	<li><a href="<?php echo base_url()?>production">Production</a></li>
    	<li><a href="<?php echo base_url()?>inventory/finished_goods">Products</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Control Panel <span class="caret"></span></a>
        	<ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url()?>users/profile/<?php echo $this->session->userdata('user_id')?>">My Profile</a></li>
                <li><a href="<?php echo base_url()?>logout">Logout</a></li>
            </ul>
		</li>
	</ul>
    <ul class="nav sidebar-footer">
    	<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/pandesal.jpg" style="height:80px;">
		<p>&copy; Kamuning Bakery 2015</p>
	</ul>            
</nav>
<!-- /#sidebar-wrapper -->
        
<!-- Page Content -->
<div id="page-content-wrapper">
	<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
		<span class="hamb-top"></span>
		<span class="hamb-middle"></span>
		<span class="hamb-bottom"></span>
	</button>