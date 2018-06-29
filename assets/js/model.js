
class Model{


	constructor(){
		

		this.canvas = document.createElement('canvas');
		document.body.appendChild(this.canvas);

		// this.canvas.setAttribute("style","display:none");
		this.canvas.width = 1024;
		this.canvas.height = 1024;

		this.width = this.canvas.width;
		this.height = this.canvas.height;

		
		this.ctx = this.canvas.getContext("2d");

		this.isGrid=false;
		this.isText=false;
		this.isColor=true;
		this.isImage=true;

		this.needsUpdate =false;
		this.isTextureReady=false;

		this.textText='';
		this.textIsBorder=false;
		this.textIsFilled = true; //fix
		this.textBorderWidth=0;
		this.textBorderColor='black';
		this.textX=50;
		this.textY=200;
		this.textType='';
		this.textSize=20;
		this.textFamily='Calibri';
		this.textColor='red';

		this.gridStep=20;

		this.colorColor = 'white';

		this.imageUrl = 'threejs/3.jpg';
		// this.textureUrl = 'threejs/3.jpg';
		this.imageOpacity =1;
		this.imageX = -210;
		this.imageY =110;
		this.imageWidth = this.width;
		this.imageHeight = this.height;
		
		// this.drawColor();
		// this.loadTexture();
	}

	drawColor(){
		this.ctx.fillStyle = this.colorColor;
		this.ctx.fillRect(0, 0, this.width, this.height);

	}
	drawText(){
		this.ctx.font = this.textType+" "+this.textSize+"pt "+this.textFamily;

		// fill
		if(this.textIsFilled){
			this.ctx.fillStyle = this.textColor;
			this.ctx.fillText(this.textText, this.textX , this.textY);
		}

		// border
		if(this.textIsBorder){
			this.ctx.lineWidth = this.textBorderWidth;
			this.ctx.strokeStyle = this.textBorderColor;
			this.ctx.strokeText(this.textText, this.textX , this.textY);
		}

	}



	drawGrid(){
		this.ctx.strokeStyle ="black";
		this.ctx.beginPath();
		this.ctx.moveTo(this.width/2,0);
		this.ctx.lineTo(this.width/2,this.height);
		this.ctx.stroke();
		var diff = this.height/(2*this.gridStep);

		for(var i=diff;i<=this.height;i=i+2*diff){

			this.ctx.strokeStyle = 'green';

			this.ctx.beginPath();
			this.ctx.moveTo(0,i);
			this.ctx.lineTo(this.width,i);
			this.ctx.stroke();

			this.ctx.strokeStyle = 'blue';
			this.ctx.beginPath();
			this.ctx.moveTo(0,i+diff);
			this.ctx.lineTo(this.width,i+diff);
			this.ctx.stroke();
		}
	}

	drawImage(callback){
		var imageObj = new Image();
		imageObj.src = this.imageUrl;
		Image.prototype.ModObj = this;
		imageObj.onload = function(){
            if(this.ModObj.isColor){
            	// alert("hi");
					this.ModObj.drawColor();
			}
			this.ModObj.ctx.save();    

			this.ModObj.ctx.globalAlpha = this.ModObj.imageOpacity; 
			// alert('pahle');
			this.ModObj.ctx.drawImage(imageObj,this.ModObj.imageX,this.ModObj.imageY,this.ModObj.imageWidth,this.ModObj.imageHeight);
			this.ModObj.ctx.restore();
			//alert('asd');
			
			if(this.ModObj.isText){
				this.ModObj.drawText();
			}
           // alert('asd');
			if(this.ModObj.isGrid){
				this.ModObj.drawGrid();
			}
			callback();
		};

	}
	
	apply(callback){
		if(this.needsUpdate){
			this.needsUpdate = false;

            if(this.isImage){
				this.drawImage(callback);
				// alert("hiim");
			}
			else{
				// alert("hi");
				if(this.isColor){
					this.drawColor();
				}
				if(this.isGrid){
					this.drawGrid();
				}
				
				if(this.isText){
					this.drawText();
				}
				callback();
			}
			
			
		}
	}


	getCanvas(){
		return this.canvas;
	}









	// setters
	setIsGrid(isGrid){
		this.isGrid = isGrid;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setIsText(isText){
		this.isText=isText;

		this.isTextureReady = false;
		this.needsUpdate = true;

	}
	setIsColor(isColor){
		this.isColor=isColor;

		this.isTextureReady = false;
		this.needsUpdate = true;

	}
	setIsImage(isImage){
		this.isImage=isImage;

		this.isTextureReady = false;
		this.needsUpdate = true;

	}


	// setText(textText,textIsBorder,isFilled,textBorderWidth,
	// 	textBorderColor,textX,textY,textType,textSize,textFamily,textColor){
	// 	this.textText=textText;
	// 	this.textIsBorder=textIsBorder;
	// 	this.isFilled = isFilled;
	// 	this.textBorderWidth=textBorderWidth;
	// 	this.textBorderColor=textBorderColor;
	// 	this.textX=textX;
	// 	this.textY=textY;
	// 	this.textType=textType;
	// 	this.textSize=textSize;
	// 	this.textFamily=textFamily;
	// 	this.textColor=textColor;

	// 	this.isTextureReady = false;
	// 	this.needsUpdate = true;
	// }
	setGrid(gridStep){
		this.gridStep = gridStep;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setImage(imageUrl,imageOpacity,imageX,imageY,imageWidth,imageHeight){
		this.imageUrl = imageUrl;
		this.imageOpacity = imageOpacity;
		this.imageX = imageX;
		this.imageY = imageY;
		this.imageWidth = imageWidth;
		this.imageHeight = imageHeight;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setColor(colorColor){
		this.colorColor = colorColor;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}

	setTextText(textText){
		this.textText=textText;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setTextIsBorder(textIsBorder){
		this.textIsBorder= textIsBorder;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setTextIsFilled(isFilled){
		this.isFilled = isFilled;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setTextBorderWidth(textBorderWidth){
		this.textBorderWidth = textBorderWidth;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}

	setTextBorderColor(textBorderColor){
		this.textBorderColor=textBorderColor;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}

	setTextX(textX){
		this.textX=textX;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}

	setTextDeltaX(deltaX){
		this.textX+=deltaX;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}		

	setTextY(textY){
		this.textY=textY;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setTextDeltaY(deltaY){
		this.textY+=deltaY;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}

	setTextType(textType){
		this.textType=textType;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}

	setTextSize(textSize){
		this.textSize=textSize;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}

	setTextFamily(textFamily){
		this.textFamily=textFamily;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setTextColor(textColor){
		this.textColor=textColor;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
     
	setImageUrl(imageUrl){
		this.imageUrl = imageUrl;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}

	setImageOpacity(imageOpacity){
		this.imageOpacity = imageOpacity;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setImageX(imageX){
		this.imageX = imageX;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setImageDeltaX(deltaX){
		this.imageX += deltaX;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setImageY(imageY){
		this.imageY = imageY;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setImageDeltaY(deltaY){
		this.imageY += deltaY;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setImageWidth(imageWidth){
		this.imageWidth = imageWidth;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setImageDeltaWidth(deltaWidth){
		this.imageWidth += deltaWidth;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setImageHeight(imageHeight){
		this.imageHeight = imageHeight;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setImageDeltaHeight(deltaHeight){
		this.imageHeight += deltaHeight;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setColorColor(colorColor){
		this.colorColor = colorColor;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	setGridStep(gridStep){
		this.gridStep = gridStep;

		this.isTextureReady = false;
		this.needsUpdate = true;
	}
	updateModel(){
		this.needsUpdate = true;
	}
}



