
var front=6,back=2,left=8,right=4;
var color=1,text=2,image=3,grid=4;
var current_face=front,current_selection=color;
var setgrid=true;
var current_face_obj;

function selectface(ob,face){
	current_face=face;
	$(".pannel:eq(0)").children().removeClass("active");
	$(ob).addClass("active");
	retainGrid();
	retainImage();
	retainText();

}

function selecttype(ob,type){
	current_selection=type;
	$(".low-pannels").css("display","none");
	$(".low-pannels:eq("+(type-1)+")").css("display","block");
	$(".pannel:eq(1)").children().removeClass("active");
	// if(type==2)

	$(ob).addClass("active");
}

function setcolor(color){
	// alert(current_face+' '+ current_selection);
	u[current_face].setColorColor(color);

}


function setText(val){
	if(u[current_face].isText==false){
		u[current_face].isText=true;
	}
	if(val==""){
		u[current_face].isText==false;
	}
	u[current_face].setTextText(val);
}

function moveText(dir){
	switch(dir){
		case 'left':
		u[current_face].setTextDeltaX(-10);
		break;
		case 'right':
		u[current_face].setTextDeltaX(10);
		break;
		case 'up':
		u[current_face].setTextDeltaY(-10);
		break;
		case 'down':
		u[current_face].setTextDeltaY(10);
		break;
	}
}


function setTextSize(val){
	u[current_face].setTextSize(val);
}
function setTextColor(val){
	u[current_face].setTextColor(val);
}
function setFontFamily(val){
	u[current_face].setTextFamily(val);
}


fonts = ["Arial","Consolas"];
$(document).ready(function(){
	var f = $("#fonts");
	for(var i = 0;i<fonts.length;i++){
		f.append("<option value = "+fonts[i]+">"+fonts[i]+"</option>");
	}
});

function moveImage(val){
	switch(val){
		case 'left':
		u[current_face].setImageDeltaX(-10);
		break;
		case 'right':
		u[current_face].setImageDeltaX(10);
		break;
		case 'up':
		u[current_face].setImageDeltaY(-10);
		break;
		case 'down':
		u[current_face].setImageDeltaY(10);
		break;

	}
}

function resizeImage(val){
	switch(val){
		case 'left':
		u[current_face].setImageDeltaWidth(-10);
		break;
		case 'right':
		u[current_face].setImageDeltaWidth(10);
		break;
		case 'up':
		u[current_face].setImageDeltaHeight(-10);
		break;
		case 'down':
		u[current_face].setImageDeltaHeight(10);
		break;

	}
}

function setImageOpacity(value){
	u[current_face].setImageOpacity(value/100);
	$("#op-val").html(value+"%");
	console.log(value/100);
}
var imageArray=new Array();
var ImageCount=0;

function getBase64Image(img) {
	var canvas = document.createElement("canvas");
	canvas.width = img.width;
	canvas.height = img.height;

	var ctx = canvas.getContext("2d");
	ctx.drawImage(img, 0, 0);

	var dataURL = canvas.toDataURL("image/png");

	return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
function setUrl(val)
{   u[current_face].setIsImage(true);
	u[current_face].setImageUrl(val);
}
function readURL(input)
{


	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			var Id="gridimage"+ ImageCount;
			var ImageName="image"+ ImageCount;

			// $("<div></div>").appendTo("#image-right-pannel");
			var imDiv=document.createElement("div");
			// imDiv.setAttribute("width","200");
			document.getElementById("image-right-pannel").appendChild(imDiv);



			var imageElement=document.createElement("img");
			imageElement.setAttribute("src", e.target.result);
			imageElement.setAttribute("height","200");
			imageElement.setAttribute("id",Id);
			imageElement.setAttribute("width","180");

			$(imDiv).css({
				"width":"180",
				"float":"left",
				"margin-left":"5"
			});


			$("<div>X</div>").appendTo($(imDiv)).on("click",function(){
				$(this).next().css("display","none");
				$(this).css("display","none");
			}).css({
				"cursor":"pointer",
				"color":"red"
			});
			imDiv.appendChild(imageElement);
			console.log(Id);
			// bannerImage = document.getElementById(Id);
			// imgData = getBase64Image(bannerImage);
			// localStorage.setItem(ImageName, imgData);
			imageElement.onclick=function (){
				setUrl(this.src);
			}
			ImageCount++;
			console.log(ImageCount);
			u[current_face].setIsImage(true);
			u[current_face].setImageUrl(e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}
function retainImage(){
	$("#image-pannel").find("input:eq(1)").prop("value",u[current_face].imageOpacity*100);
	$("#op-val").html(u[current_face].imageOpacity*100+"%");
}
function retainText(){
	console.log(u[current_face].textSize);
	$("#text-pannel").find("input:eq(0)").prop("value",u[current_face].textText);
	$("#text-pannel").find("input:eq(1)").prop("value",u[current_face].textSize);
	$("#text-pannel").find("select:eq(0)").prop("value",u[current_face].textFamily);
	$("#text-pannel").find("input:eq(2)").prop("value",u[current_face].textColor);


}
function retainGrid(){
	$("#grid-option").find("input").prop("value",u[current_face].gridStep);
	if(u[current_face].isGrid)
	{
		$("#grid-switch").prop('checked',true);
		$("#grid-option").css("display","block");

		console.log(u[current_face].gridStep);
	}
	else
	{
		$("#grid-switch").prop('checked',false);
		$("#grid-option").css("display","none");

	}
	console.log(u[current_face].isGrid);
}
function showHideGrid(val){
	var on=val.checked;
	u[current_face].setIsGrid(on);
	if(on){
		$("#grid-option").css("display","block");
	}
	else{
		$("#grid-option").css("display","none");
	}
	console.log(on);
}

function controlGridPattern(grid){
	console.log(grid.value);
	$("#grid-step").html(grid.value);
	u[current_face].setGridStep(grid.value);
}


// ---------------------------------------inline color jQuery----------------------------------------
$(document).ready(function(){
	$("#textcolor").spectrum({
		flat: true,
		showInput: true,
		showPalette: true,
		palette: [
			['black', 'white', 'blanchedalmond'],
			['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
		],
		clickoutFiresChange:false
	});

	$("#facecolor").spectrum({
		flat: true,
		showInput: true,
		showPalette: true,
		palette: [
			['black', 'white', 'blanchedalmond'],
			['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
		],
		clickoutFiresChange:false
	});
});


// --------------------------------------------Save / load design -------------------------------------------------
function saveDesign(){
	var str = JSON.stringify(u);
	console.log(str);
	var url = base_url('ajax/AjaxDesign/save_design');
	$.ajax({
		url:url,
		type:'post',
		data:{
			save:str,
			pro_id:2,
		},
		success:function(text){
			// console.log('saved');
			console.log(text);
		},
		error:function(text){
			// console.log('error');
			// console.log(text);
			console.log(text.responseText);

		}

	});
}
