
<!-- <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50"> -->

<!-- Header start -->


<!-- <div  class="card-seperator"></div> -->
<!-- header end -->



<!-- promotional carosuls start -->

<div class="container-fluid" style="">
	<div class="home-demo">
		<?
		$data =
		[
			'indiv_data'	=>
			[
				[
					'src'	=>	base_url('assets/images/res.jpg'),
					'head'	=>	'Heading',
					'desc'	=>	'Description',
				],
				[
					'src'	=>	base_url('assets/images/res.jpg'),
					'head'	=>	'Heading',
					'desc'	=>	'Description',
				],
			]



		];
		$this->load->view('common/offer_carousel',$data);
		?>
	</div>
</div>
<!-- promotional carosuls end -->

<!-- cards start -->
<?
$carousels =
[
	[
		'head'	=>	'tirl',
		'carousel_data'	=>
		[
			'indiv_data'	=>
			[
				[
					'name'		=>	'adsas',
					'id'		=>	'1',
					'src'		=>	base_url('assets/images/ny2.jpg'),
					'ac_price'	=>	1000,
					'discount'	=>	20,
					'disprice'	=>	800,

				],
				[
					'name'		=>	'adsas',
					'id'		=>	'2',
					'src'		=>	base_url('assets/images/ny2.jpg'),
					'ac_price'	=>	1000,
					'discount'	=>	20,
					'disprice'	=>	800,

				],
				[
					'name'		=>	'adsas',
					'id'		=>	'2',
					'src'		=>	base_url('assets/images/ny2.jpg'),
					'ac_price'	=>	1000,
					'discount'	=>	20,
					'disprice'	=>	800,

				],
				[
					'name'		=>	'adsas',
					'id'		=>	'2',
					'src'		=>	base_url('assets/images/ny2.jpg'),
					'ac_price'	=>	1000,
					'discount'	=>	20,
					'disprice'	=>	800,

				],
				[
					'name'		=>	'adsas',
					'id'		=>	'2',
					'src'		=>	base_url('assets/images/ny2.jpg'),
					'ac_price'	=>	1000,
					'discount'	=>	20,
					'disprice'	=>	800,

				],


			]
		],

	],
	[
		'head'	=>	'tirl',
		'carousel_data'	=>
		[
			'indiv_data'	=>
			[
				[
					'name'		=>	'adsas',
					'id'		=>	'1',
					'src'		=>	base_url('assets/images/ny2.jpg'),
					'ac_price'	=>	1000,
					'discount'	=>	20,
					'disprice'	=>	800,

				],
				[
					'name'		=>	'adsas',
					'id'		=>	'2',
					'src'		=>	base_url('assets/images/ny2.jpg'),
					'ac_price'	=>	1000,
					'discount'	=>	20,
					'disprice'	=>	800,

				],
			]
		],



	],


]
?>


<div class="container-fluid" style="">
	<?foreach ($carousels as $carousel) {?>
		<div class="home-demo">
			<div class="row">
				<div class="large-12 columns">
					<h3><?=$carousel['head']?></h3>
					<?
					$this->load->view('common/product_carousel',$carousel['carousel_data']);
					?>
				</div>
			</div>
		</div>
		<div  class="card-seperator"></div>
		<?}?>
	</div>

	<!-- cards end -->

	<!-- container women men start-->

	<div class="container-fluid text-center" style="width:80%;">
		<h3>SHOP BY MEN AND WOMEN</h3>
		<div class="row">
			<div class="col-md-6 text-center" >
				<div id="tile">
					<div class="text-center">MEN</div>
					<div class="men-women">
						<a href=""><img src="assets/logo/men.jpg"></a>
					</div>
				</div>
			</div>
			<div class="col-md-6 text-center">
				<div id="tile">
					<div class="text-center">WOMEN</div>
					<div class="men-women">
						<a href=""><img src="assets/logo/women.jpg"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div  class="card-seperator"></div>
	<!-- container women men end -->
	<script type="text/javascript">
	function movetowishlist(id){
		$.ajax({url: "test.php?wishlist=true&pro_id="+ id , success: function(result){
			alert("item Added to wishlist");
		}});
	}
	</script>
