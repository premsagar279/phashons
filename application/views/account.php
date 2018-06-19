<div class="container">
	<?
	// prettyDump($users);
	?>
	<div class="row">

		<div class="col-md-4">
			<div class="text-center">
				<img class="img-thumbnail img-circle" src="assets/images/<?=$users['profile_image']?>" alt="Profile Image"/>
			</div>
		</div>
		<div class="col-md-8">
			<div class="col-md-4">
				<div id="follower">
					<span> Followers: <?=$followers['followers']?></span>
				</div>
			</div>
			<div class="col-md-4">
				<div id="Following">
					<span> Following: <?=$followings['followings']?></span>
				</div>
			</div>
			<div class="col-md-4">
				<?if($this->session->userdata('id') !== $users['id']):?>
					<div id="follow_button">
						<form method="POST">
							<button class="form-control btn btn-info" name="follow" value="<?=$users['id']?>">Follow</button>
						</form>
					</div>
				<?endif;?>
			</div>





			<br>
			<hr>
		</div>
	</div>
</div>
<div  class="card-seperator"></div>
<div class="row sections">
	<div class="col-md-12">
		<div class="tab">
			<button class="tablinks active" onclick="display(event, 0)">Personal Info</button>
			<button class="tablinks" onclick="display(event, 1)">Addresses</button>
			<button class="tablinks" onclick="display(event, 2)">Cards</button>
			<button class="tablinks" onclick="display(event, 3)">Payments</button>
			<button class="tablinks" onclick="display(event, 4)">Social Media</button>
			<button class="tablinks" onclick="display(event, 5)">Password</button>

		</div>

		<!--  Tab content -->
		<div class="tabcontent active">
			<p>
				Name:- <?php echo $users['fname'].' '.$users['lname']; ?>
			</p>
			<p>
				Mobile:- <?php echo $users['mobile']; ?>
			</p>
			<p>
				Email:- <?php echo $users['email']; ?>
			</p>
		</div>

		<div class="tabcontent">
			<?php
			foreach ($address as $key => $addr) {?>
				<div id="address">
					<h1> Address <?php echo $key+1; ?></h1><hr>
					<h3><?php echo $addr['address_line1'] ?>   </h3>
					<h3><?php echo $addr['address_line2'] ?>  </h3>
					<h3><?php echo $addr['city'] ?>  </h3>
					<h3><?php echo $addr['state'] ?>  </h3>
					<h3><?php echo $addr['pincode'] ?>  </h3>
					<h3><?php echo $addr['mobile'] ?>  </h3>
					<br>
				</div>
			<?php }?>
		</div>

		<div class="tabcontent">
			<h3>Cards</h3>
				<table>
					<thead>
						<th>Card Name</th>
						<th>Bank Name</th>
						<th>Card Number</th>
						<th>Date of Expiry</th>
						<th>Edit</th>
						<th>Delete</th>

					</thead>
					<?foreach ($cards as $key ) :?>
						<td><?=$key['name']?></td>
						<td><?=$key['bank_name']?></td>
						<td><?=$key['number']?></td>
						<td><?=$key['date_expiry']?></td>
						<td>
							<form method="post">
								<button class="form-control btn btn-info" name="edit" value="<?=$key['number']?>">Edit</button>
							</form>
						</td>
						<td>
							<form method="post">
								<button class="form-control btn btn-danger" name="delete" value="<?=$key['number']?>">Delete</button>
							</form>
						</td>

					<?endforeach;?>
				</table>
		</div>
		<div class="tabcontent">

		</div>
		<div class="tabcontent">
			<h3>Follow at:</h3>
			<div class="col-md-3 col-sm-6">
				<!-- <i class="fab fa-facebook-f"><?=$users['facebook_profile']?></i> -->
			</div>
			<div class="col-md-3 col-sm-6">
				<!-- <i class="fa fa-instagram"><?=$users['instagram_profile']?></i> -->
			</div>
			<div class="col-md-3 col-sm-6">
				<!-- <i class="fa fa-twitter"><?=$users['twitter_profile']?></i> -->
			</div>

		</div>
		<div class="tabcontent">
			<div class="row">
				<form  method="post">
					<div class="col-md-12 col-sm-12">
						<label>Current Password</label>
						<input class="form-control" name="current_pass" placeholder="Current Password"/>
					</div>
					<div class="col-md-12 col-sm-12">
						<label>New Password</label>
						<input class="form-control" name="new_pass" placeholder="New Password"/>
					</div>
					<div class="col-md-12 col-sm-12">
						<label>Verify Password</label>
						<input class="form-control" name="verify_pass" placeholder="Verify Password"/>
					</div>
					<div class="col-md-12 col-sm-12">
						<input class="form-control btn btn-info" type="submit" name="submit" value="Change"/>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
