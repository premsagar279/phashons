<!-- ||||||||||||||||||||||||||||||||PROGRESS BAR|||||||||||||||||||||||||||||||||||||||||||||||||||| -->
<div class='progress' id="progress_div">
	<div class='bar' id='bar1'></div>
	<div class='percent' id='percent1'></div>
</div>
<input type="hidden" id="progress_width" value="0">

<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||MAIN CONTAINER|||||||||||||||||||||||||||| -->
<div class="container-fluid">
	<div class="row" style="margin: 0px;">
		<div class="col-md-4">
			<div class="pannel" id="faces">
				<button class="btn btn-info active"  onclick="selectface(this,front)">FRONT</button>
				<button class="btn btn-info" onclick="selectface(this,back)">BACK</button>
				<button class="btn btn-info" onclick="selectface(this,right)">RIGHT</button>
				<button class="btn btn-info" onclick="selectface(this,left)">LEFT</button>
			</div>

			<!-- |||||||||||||||||||||||||||||COLOR PANNEL ||||||||||||||||||||||||||||||||||||||-->
			<div class="low-pannels" id="color-pannel" style="display:none;">
				<input type='text' value="white" id="facecolor" onchange="setcolor(this.value)" />
			</div>

			<!-- |||||||||||||||||||||||||||||||||||TEXT PANNEL |||||||||||||||||||||||||||| -->
			<div class="low-pannels" id="text-pannel" style="display:none;">
				<label>TEXT:<input type="text"  class="form-control" value="" placeholder="enter text" onchange="setText(this.value)" ></label>
				<hr>
				<label>SIZE:<input type="number"  class="form-control" value="40" onchange="setTextSize(this.value)"></label>
				<hr>
				<label>COLOR:</label> <br>
				<input type='text' value="white" id="textcolor" onchange="setTextColor(this.value)">
				<hr>
				<label>FONT FAMILY:
					<select id="fonts"  class="form-control" onchange="setFontFamily(this.value)">

					</select>
				</label>
				<hr>

				<br>
				<div class="movement" id="text-movement">
					<center><label>ALIGN TEXT:</label> </center><br><br>
					<center>
						<button type="submit" class="btn btn-success" style="margin-bottom:5px;" onclick="moveText('up')">
							<span class="glyphicon glyphicon-chevron-up"> </span>
						</button>
					</center>
					<button type="submit" class="btn btn-success" style="float: left;" onclick="moveText('left')">
						<i class="glyphicon glyphicon-chevron-left"></i>
					</button>
					<button type="submit" class="btn btn-success" style="float: right" onclick="moveText('right')" >
						<i class="glyphicon glyphicon-chevron-right"></i>
					</button><br><br>
					<center>
						<button type="submit" class="btn btn-success" onclick="moveText('down')" >
							<span class="glyphicon glyphicon-chevron-down"></span>
						</button>
					</center>
				</div>
			</div>

			<!-- |||||||||||||||||||||||||||||||||||||||IAMGE PANNEL||||||||||||||||||||||||||||||||||| -->
			<div class="low-pannels" id="image-pannel" style="display: none;">
				<input type='file' id="uploadImage" accept="image/*" onchange="readURL(this);" />

				<hr>
				<label>OPACITY:<input type="range" min="0" max="100" value="100"  onchange="setImageOpacity(this.value)">
					<div id="op-val"></div>
				</label>
				<hr>
				<div class="movement" id="image-movement">
					<center><label>ALIGN Image:</label> </center><br><br>
					<center>
						<button type="submit" class="btn btn-success" style="margin-bottom:5px;" onclick="moveImage('up')">
							<span class="glyphicon glyphicon-chevron-up"> </span>
						</button>
					</center>
					<button type="submit" class="btn btn-success" style="float: left;" onclick="moveImage('left')">
						<i class="glyphicon glyphicon-chevron-left"></i>
					</button>
					<button type="submit" class="btn btn-success" style="float: right" onclick="moveImage('right')" >
						<i class="glyphicon glyphicon-chevron-right"></i>
					</button><br><br>
					<center>
						<button type="submit" class="btn btn-success" onclick="moveImage('down')" >
							<span class="glyphicon glyphicon-chevron-down"></span>
						</button>
					</center>
				</div>
				<hr>
				<div class="movement" id="image-resize">
					<center><label>Resize Image:</label> </center><br><br>
					<center>
						<button type="submit" class="btn btn-success" style="margin-bottom:5px;" onclick="resizeImage('up')">
							<span class="glyphicon glyphicon-plus"> </span>
						</button>
					</center>
					<button type="submit" class="btn btn-success" style="float: left;" onclick="resizeImage('left')">
						<i class="glyphicon glyphicon-minus"></i>
					</button>
					<button type="submit" class="btn btn-success" style="float: right" onclick="resizeImage('right')" >
						<i class="glyphicon glyphicon-plus"></i>
					</button><br><br>
					<center>
						<button type="submit" class="btn btn-success" onclick="resizeImage('down')" >
							<span class="glyphicon glyphicon-minus"></span>
						</button>
					</center>
				</div>
				<hr>

			</div>
			<!-- ||||||||||||||||||||||||||||||||||||| GRID PANNEL ||||||||||||||||||||||||||||||||||||||||||| -->
			<div class="low-pannels" id="grid-pannel" style="display: none;">
				<hr>
				<strong>ON/OFF:</strong><br>
				<label class="switch">
					<input type="checkbox" id="grid-switch" onchange="showHideGrid(this)">
					<span class="slider"></span>
				</label>
				<div id="grid-option" style="display:none">
					<hr>
					<label>PATTERN:<input  type="range"  min="10" max="70" value="20" onchange="controlGridPattern(this)">
						<div id="grid-step"></div>

					</label>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<!-- |||||||||||||||||||||||||||||||||||||||BASIC ACTION|||||||||||||||||||||||||||||||||||||||||| -->
			<div class="pannel" >
				<button class="btn btn-info" onclick="selecttype(this,color)">COLOR</button>
				<button class="btn btn-info"onclick="selecttype(this,text)">TEXT</button>
				<button class="btn btn-info" onclick="selecttype(this,image)">IMAGE</button>
				<button class="btn btn-info" onclick="selecttype(this,grid)">GRID</button>
			</div>

			<!-- ||||||||||||||||||||||||||||||||||||||||MODEL BOX|||||||||||||||||||||||||||||||||||||||||||| -->
			<div id="model">

			</div>
			<div class="pannel">
				<div id="check">

				</div>
			</div>
		</div>

		<!-- ||||||||||||||||||||||||||||||||||||||||||||||  ||||||||||||||||||||||||||||||||||||||||||||||||||-->
		<div class="col-md-4">
			<div id="image-right-pannel">
				<button class="btn btn-info" onclick="saveDesign()">SAVE</button>
			</div>
		</div>
	</div>
</div>
