<?php foreach ($var as $key): ?>
	<div class="col-md-4" style="margin: 0px; padding: 0px;">
		<div id="card">
			<div id="title"><?=$key['name']?></div>
			<div id="desc"><?=$key['brand']?>,<?=$key['category']?></div>
			<a href="details.php/<?=$key['id']?>"><img class="img img-responsive" src="<?=$key['src']?>" alt="<?=$key['name']?>" style="height:250px;width:auto;"/></a>
			<strike>Rs. <?=$key['price']?></strike> (<span style="color:red"><?=$key['dis']?>% OFF</span>)<br> <strong>Rs. <?=$key['tprice']?></strong>
			<hr>
			<input type="button" class="btn btn-info" id="wish" value="To Wishlist" onclick="movetowishlist(<?=$key['id']?>)"/>
			<a href="details.php/<?=$key['id']?>"><input type="button" class="btn btn-info"  value="Buy Now"/></a>
		</div>
	</div>
<?php endforeach; ?>
