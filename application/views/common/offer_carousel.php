<div class="owl-carousel offer_carousel">
	<?foreach ($indiv_data as $key ) :?>
	<div class="item">
		<img src="<?=$key['src']?>">
		<div class="carousel-caption">
			<h3><?=$key['head']?></h3>
			<p><?=$key['desc']?></p>
		</div>
	</div>
	<?endforeach;?>

</div>
<div  class="card-seperator"></div>
