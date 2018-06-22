<div class="wrapper">
	<!-- Sidebar Holder -->
	<nav id="sidebar">
		<div style="height:120px;"></div>
		<form method="GET">
			<ul class="list-unstyled components" >
				<li>
					<a href="#subcategiries" data-toggle="collapse" aria-expanded="false">Categories</a>
					<ul class="collapse list-unstyled" id="subcategiries">
						<?
						$CI = &get_instance();
						$CI->load->view('common/divPrinterView',$cat);
						?>

					</ul>
				</li>
				<li>
					<a href="#tagref" data-toggle="collapse" aria-expanded="false">Gender</a>
					<ul class="collapse list-unstyled" id="tagref">
						<?$CI->load->view('common/divPrinterView',$gender);?>
					</ul>
				</li>
				<li>
					<a href="#price" data-toggle="collapse" aria-expanded="false">Price</a>
					<ul class="collapse list-unstyled" id="price">
					<!-- Use javascript to set the values  -->
						<li style="margin:20px;">
							<input id='priceLow' type="range" name="priceLow" step="1" min="1" max="5000" oninput="
							priceLowO.value = priceLow.value;
							priceHigh.min = priceLow.value;
							">
							<output id="priceLowO"></output>
						</li>
						<li style="margin:20px;">

							<input id='priceHigh' type="range" name="priceHigh" step="1"  min="1" max="5000" oninput="
							priceHighO.value = priceHigh.value;
							priceLow.max = priceHigh.value;
							">
							priceHigh
							<output id="priceHighO"></output>
						</li>
					</ul>
				</li>
				<li>
					<a href="#art" data-toggle="collapse" aria-expanded="false">Art</a>
					<ul class="collapse list-unstyled" id="art">
						<?$CI->load->view('common/divPrinterView',$art);?>
					</ul>
				</li>
			</ul>
			<ul>
				<input type="submit" name="submit" class="btn btn-info" value="Apply"/>
				<input type="submit" name="reset" class="btn btn-info" value="Reset"/>
			</ul>
		</form>

	</nav>

	<!-- Page Content Holder -->
	<div id="content">

		<nav class="navbar navbar-default"  style="margin-top:70px;margin-bottom: 0px; ">
			<div class="container-fluid" style="background-color: white;">

				<div class="navbar-header">
					<button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
						<i class="glyphicon glyphicon-filter"></i>
						<span>Filter</span>
					</button>
				</div>

				<!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Page</a></li>
						<li><a href="#">Page</a></li>
						<li><a href="#">Page</a></li>
						<li><a href="#">Page</a></li>
					</ul>
				</div> -->
			</div>
		</nav>
		<hr>
		<div class="row">
			<?
				$CI->load->view('common/productCardPrinter',$products);
			?>
		</div>
	</div>
</div>
