<!DOCTYPE HTML>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VYUH 7.0 | AAGNEYA</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/vyuh-logo.jpg">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/master.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/header.css">

<!-- Fonts -->
<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/sb/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="/vyuh/assets/sb/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/sb/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb/vendor/bootstrap/js/bootstrap.min.js"></script>

</head>

<body>

<!-- Header Start -->
<div>
<header id="header">
	<!-- Navbar Start -->
	<nav class="navbar navbar-default navbar-fixed navbar-scrollspy bootsnav" data-minus-value-desktop="0" data-minus-value-mobile="55" data-speed="800">
		<div class="container">
			<!-- Start Header Navigation -->
			<div class="navbar-header row">
                            <div class="col-xs-8">
                                
                                <a class="navbar-brand" href="http://aagneyavyuh.co.in">
                                    <img src="<?php echo base_url(); ?>assets/images/vyuh-logo.jpg" class="logo logo-display" alt="">
                                    <img src="<?php echo base_url(); ?>assets/images/vyuh-logo.jpg" class="logo logo-scrolled" alt="">
                                </a>
                                
                            </div>
                            <?php if($this->session->userdata('profile_picture')) {echo'<li><div class="hidden-md hidden-lg float-right User-area">
                <div class="User-avtar">
                 <img src="'.$this->session->userdata('profile_picture').'"/>
                </div>
                  <ul class="text-left User-Dropdown">
                    <div class="user-data">'.$this->session->userdata('name').'<br>'.$this->session->userdata('email').'</div>
                    <li><a>Coins</a><span>'.$this->session->userdata('coins').'</span></li>
                    <li><a href="'.base_url().'profiles">Profile</a></li>
                    <li><a href="'.base_url().'logout">Logout</a></li>
                  </ul>
</div></li>';} ?>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <i class="fa fa-bars"></i> </button>
				
			</div>
			<!-- End Header Navigation -->
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li class="scrol"><a href="<?php echo base_url(); ?>dashboard">HOME</a> </li>
					<!--<li class="scrol"><a href="<?php echo base_url(); ?>vyuh/index.php/profile">Profile</a> </li>-->
					<li class="scrol"><a href="<?php echo base_url(); ?>game">GAME</a> </li>
					<li class="scrol"><a href="<?php echo base_url(); ?>ranklist">RANK LIST</a> </li>
					<li class="scrol"><a href="<?php echo base_url(); ?>rules">RULES</a> </li>
					<!--<li class="scrol"><a href="/vyuh/index.php/how_to_play">How to Play</a> </li>-->
					<!--<li class="scrol"><a href="/vyuh/index.php/user_authentication/logout">Logout</a> </li>-->
<!--                                        <div class="userSection">
            <div class="userSection__dropdownToggle" data-toggle="dropdown">
              <div class="userSection__userAvatar">
                <img class="" src="http://placehold.it/150x150" alt="User Avatar">
              </div>
              <i class="userSection__caret"></i>
            </div>
            <ul class="userSection__userMenu">
              <li class="userSection__userMenu__menuItem"><a href="#" >User menu item</a></li>
              <li class="userSection__userMenu__menuItem"><a href="#" >User menu item</a></li>
              <li class="userSection__userMenu__menuItem"><a href="#" >User menu item</a></li>
              <li class="userSection__userMenu__menuItem"><a href="#" >User menu item</a></li>
            </ul>
          </div>
        </div>-->

<?php if($this->session->userdata('profile_picture')) {echo'<li><div class="hidden-xs User-area">
                <div class="User-avtar">
                 <img src="'.$this->session->userdata('profile_picture').'"/>
                </div>
                  <ul class="User-Dropdown">
                    <div class="user-data">'.$this->session->userdata('name').'<br>'.$this->session->userdata('email').'</div>
                    <li><a>Level</a><span>'.$this->session->userdata('level').'</span></li>
                    <li><a>Coins</a><span>'.$this->session->userdata('coins').'</span></li>
                    <li><a href="'.base_url().'logout">Logout</a></li>
                  </ul>
</div></li>';} ?>


				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
	</nav>
        
	</header>
</div>
<!-- Header End -->


    <!--To View on scroll-->
<script src="<?php echo base_url(); ?>js/jquery.appear.js"></script>

<script src="https://cdn.jsdelivr.net/npm/typeit@5.5.2/dist/typeit.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/header.js"></script>