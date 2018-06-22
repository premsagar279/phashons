
<div class="owl-carousel product_carousel">
	<?foreach ($indiv_data as $key ) :?>
	<div class="item">
		<div id="owl-card" class="card" style="background-color: white;">
			<div id="title"><?=$key['name']?></div>
			<a href="details.php/<?=$key['id']?>">
				<img class="img img-responsive" src="<?=$key['src']?>" alt="Image" style="height:300px;width:auto;"/>
			</a>
			<strike>Rs. <?=$key['ac_price']?></strike> (
			<span style="color:red"><?=$key['discount']?> % OFF</span>
			)<br />
			<strong>Rs.<?=$key['disprice']?> </strong>
			<hr>
			<input type="button" class="btn btn-info" id="wish" value="To Wishlist" onclick="movetowishlist(<?=$key['id']?>)"/>
			<a href="details.php/<?=$key['id']?>"><input type="button" class="btn btn-info"  value="Buy Now"/></a>
		</div>
	</div>
	<?endforeach;?>

</div>
