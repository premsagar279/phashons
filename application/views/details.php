<div  class="container-fluid" style="width:100%;margin-bottom:70px;">
	<div class="row" id="main-tile">
		<div class="col-md-7">
			<div id="pro-tile">
				<div class="row" >
					<div class="col-md-3">
						<div class="row1">
							<?
							foreach ($images as $key => $value):?>
							<div class="column">
								<img class="demo cursor" src="<?=$value?>"  style="width:100%" onmouseover="currentSlide('<?=$key+1?>')" alt="The Woods">
							</div>
							<?endforeach;?>
						</div>
					</div>
					<div class="col-md-9" >
						<?php
						foreach ($this->pro['image'] as $key => $value) {
							echo'<div class="mySlides">
							<img src="admin/images/products/'.$value.'" style="width:100%">
							</div>';
						}
						?>
						<a class="prev" style="text-decoration: none;" onclick="plusSlides(-1)">❮</a>
						<a class="next" style="text-decoration: none;" onclick="plusSlides(1)">❯</a>

						<div  style="height: auto;">
							<hr>
							<?php $this->wishCartButton($this->pro['id']);?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5" style="padding: 0px;">
			<div  class="card-seperator" id="seperate"></div>
			<div id="tile">
				<div id="sub-tile">
					<h4 style="margin-bottom:2px; text-align: center;"><?php $view->loadProTitle();?></h4>
					<hr style="margin-top:0px;">
					<?php $view->loadProPrice(); ?>
					<span style="float:right; color:cyan"> <a href="">Size chart</a> </span>
					<select id="size">
						<option value=0>select size</option>
						<option value='s'>S</option>
						<option value='m'>M</option>
						<option value='l'>L</option>
						<option value='xl'>XL</option>
						<option value='xll'>XLL</option>
					</select>
					<div id="div1"></div>
					<div id='cart-info-danger' class="alert " style="display:none;">
						<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
						<strong>Please select size!</strong>
					</div>
					<div id='cart-info-success' class="alert success" style="display:none;">
						<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
						<strong>Item added to cart</strong>
					</div>
					<script>
					var pro="<?php echo $_GET['pro_id'];?>";

					$(document).ready(function(){
						$("#cart").click(function(){
							var x= $("#size").val();
							if(x==0)
							{
								$("#cart-info-success").css("display","none");
								$("#cart-info-danger").css("display","block");

								document.getElementById('cart-info-danger').scrollIntoView();
							}
							else{
								$("#cart-info-danger").css("display","none");
								$.ajax({url: "test.php?add-to-cart=true&pro_id="+ pro + "&pro_size=" + x, success: function(result){
									$("#cart-item").html(result);
									$("#cart-info-success").css("display","block");
									// document.getElementById('cart-info-success').scrollIntoView();
								}});
							}
						});
					});

					</script>

				</div>

				<div id="sub-tile">
					OFFERS
				</div>

				<div id="sub-tile">
					<h4>DESCRIPTION</h4>
				</div>
			</div>
		</div>
	</div>
</div>
