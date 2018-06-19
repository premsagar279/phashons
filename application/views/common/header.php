

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">


	<nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg" style="box-shadow: 0 1px 3px rgba(0,0,0,0.8); background-color:#ddd; color: #ddd;">
		<div class="container-fluid " style="width: 100%;background-color:#2d2d30; color: #ddd">
			<div style="text-align: right;">
				<ul style="list-style-type: none; margin-bottom: 0px; font-size: 12px;">
					<li style="display: inline-block; padding-right: 7px ">
						<span>Track order</span>
					</l      i>
					<li style="display: inline-block;padding-right: 7px">
						<span>Bulk order</span>
					</li>
					<li style="display: inline-block;padding-right: 7px">
						<span>Sell your art</span>
					</li>
				</ul>
			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a  href="home.php">
					<img src="assets/logo/phashons_logo.png" style="height:70px; width:auto; margin-bottom:5px;" />
				</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar" style="margin-top:15px;">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">MEN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
						<ul class="dropdown-menu">
							<?
							foreach ($mCat as $key):?>
							<li><a href="<?=site_url('categories:'.$key['id'].'/tagref:'.$key['type'] )?>"><?=$key['name']?></a></li>
							<?
						endforeach;
						?>

					</ul>
				</li>
				<!-- women -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">WOMEN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</a>
					<ul class="dropdown-menu">
						<?
						foreach ($wCat as $key):?>
						<li><a href="<?=site_url('categories:'.$key['id'].'/tagref:'.$key['type'] )?>"><?=$key['name']?></a></li>
						<?
					endforeach;
					?>

				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">

			<!-- search bar start -->
			<li>
				<div id="search-bar">
					<form method="get" action="results.php" id="search">
						<input name="search" type="text" size="40" placeholder="Search..." />
					</form>
				</div>
			</li>

			<li><a href="design.php" style="text-shadow: 2px 2px #f5ccaa;"><strong>DESIGN YOURSELF</strong ></a></li>
				<!-- wishlist icon -->
				<li><a href="wishlist.php"><span class="glyphicon glyphicon-heart">
					<!-- <?php
					//echo $totalwish;
					?> -->
				</span></a></li>

				<!-- cart icon -->
				<li> <a href="view_cart.php">
					cart
					<span id="cart-item" class="badge">
						<?=$card_count?>
					</span>

				</a>
			</li>
			<!-- profile -->

			<?
			if(!$islogged){
				?>

				<li><a type="button" data-toggle="modal" data-target="#loginModel"><span class="glyphicon glyphicon-user">LOGIN</span></a></li>

			<? }
			else{ ?>
				<li class="dropdown" style="margin-right: 15px; padding-top:0px;">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><img class="img img-responsive img-circle" src=<?=$user->profile_image?> style="height:30px;width:auto" alt="hello"></a>
					<ul class="dropdown-menu">
						<li><center>HI <?=$user->fname." ".$user->lname?></center></li>
						<li><hr style="margin: 0px;"></li>
						<li><a href="#">Your Design</a></li>
						<li><hr style="margin: 0px;"></li>
						<li><a href="profile.php/<?=$user->id?>">Profile</a></li>
						<li><hr style="margin: 0px;"></li>
						<li><a href="account.php/<?=$user->id?>">Account</a></li>
						<li><hr style="margin: 0px;"></li>
						<li><a href="<?=base_url('index.php/login/logout')?>">Logout</a></li>

						<!-- first user_id, then flag true of logout -->

					</ul>
				</li>
			<?php }?>

		</ul>



	</div>
</div>
<!-- <hr> -->
</nav>
<div  style="height:100px; "></div>
