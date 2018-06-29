
window.onload = function(){
		//width and height of the models container
		width = 0.3*window.innerWidth;
		height= 0.6*window.innerHeight;

		var strDownloadMime = "image/octet-stream";

		//always create scene,camera, and resize

		var div = document.getElementById("model");
		var scene = new THREE.Scene();
		var camera = new THREE.PerspectiveCamera( 75, width/height, 0.1, 2000 );
		var renderer = new THREE.WebGLRenderer({antialias:true,
			preserveDrawingBuffer: true
		});
		renderer.setClearColor(0xdddddd,1);
		renderer.setSize(width, height);
		div.appendChild(renderer.domElement);

		//needs some work
		window.addEventListener('resize',function(){

			width = window.innerWidth;
			height= window.innerHeight;
			if(width>991)
			{
				width=width*0.3333;
				height=height*0.6;
			}
			else if(width<=991 && width >=0){
				width = width*0.9;

			}
			renderer.setSize(width, height);
			camera.aspect = width/height;
			camera.updateProjectionMatrix();
		});

		//include the fucking OrbitControl and set certain controls
		controls = new THREE.OrbitControls(camera,renderer.domElement);
		// controls.enablePan = false;
		// controls.enableZoom = true;
		controls.enabelKeys = false;

		/*||||||||||||||||||||||||Contol rotation||||||||||||||||||||||||||||||||||||*/
		controls.maxPolarAngle=2*Math.PI/3;
		controls.minPolarAngle=Math.PI/3;

		/*||||||||||||||||||||||||control zoom|||||||||||||||||||||||||||||||||||||||*/
		controls.maxDistance=1200;
		controls.minDistance=300;

		/*|||||||||||||||||||||||||||||||||||LOADING MODEL AND APPLYING CANVAS|||||||||||||||||| */
		u=new Array();
		t=new Array();
		var textureLoader = new THREE.TextureLoader();
		var texture = textureLoader.load( base_url('assets/textures/3.jpg'));
		var count=0;
		var loader = new THREE.OBJLoader();
		var modelName = "assets/models/3/roundneckfullmale.obj";
		// console.log(base_url()+"models/3/roundneck full sleeve male.obj");
		loader.load (base_url(modelName), function ( object ) {
			geo = object;
			var objBbox = new THREE.Box3().setFromObject(object);

            // Geometry vertices centering to world axis
            var bboxCenter = objBbox.getCenter().clone();
            bboxCenter.multiplyScalar(-1);

            object.traverse(function (node) {
            	if (node.isMesh) {
            		u[count]=new Model();
            		t[count]=new THREE.MeshPhongMaterial({map: texture, side: THREE.DoubleSide});
            		node.material =t[count];
            		count=count+1;
            		node.geometry.translate(bboxCenter.x, bboxCenter.y-20, bboxCenter.z);
            	}
            });
			//alert('inner'+count);
			objBbox.setFromObject(object);
			scene.add(object);


		});

		//add a bit of lighting
		var directionalLight = new THREE.DirectionalLight('white',0.2);
		directionalLight.position.set = (0,30,10);
		scene.add(directionalLight);
		var directionalLight1 = new THREE.DirectionalLight('white',0.2);
		directionalLight1.position.set = (0,30,-10);
		scene.add(directionalLight1);

		var ambientLight = new THREE.AmbientLight('white',0.7);
		scene.add(ambientLight);
		// window.addEventListener('click',onMouseclick,false);
		// var mouse = new THREE.Vector3();
		// function onMouseclick(e){

		// 	console.log("mouseUp")
		// 	mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
		// 	mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
		// 	mouse.z=700;
		// 	var raycaster = new THREE.Raycaster();
		// 	raycaster.setFromCamera(mouse, camera);
		// 	// scene.add(new THREE.ArrowHelper( raycaster.ray.direction, raycaster.ray.origin, 100, Math.random() * 0xffffff ));
		// 	var intersects = raycaster.intersectObjects(scene.children);
		// 	console.log(intersects.length);
		// 	for (var i = 0; i < intersects.length; i++) {
		// 		console.log(i);
		// 		console.log(intersects[i]);
		// 		intersects[i].object.material.color.set(0x0000ff);
		// 	}
  //   }

		//Set camera position
		camera.position.z =700;

		//game Logic

		function update(index){
				if(u[index].needsUpdate){
                u[index].apply(function(){
                	// console.log(index);
                	var count=0;
                	t[index].needsUpdate=true;
                	t[index].map.needsUpdate=true;
                	if(geo){
                		t[index]=new THREE.MeshPhongMaterial({map: new THREE.CanvasTexture(u[index].getCanvas()), side: THREE.DoubleSide});
                		geo.traverse(function (node) {
                			if (node.isMesh) {
                				if(count==index)
                					node.material = t[index];
                				count++;
                			}
                		});
                	}
                });
			}
		};


		//create scene
		function render(){
			renderer.render(scene, camera);

		};



		//run game loop (update,render,repeat)
		var GameLoop = function(){
			requestAnimationFrame(GameLoop);
			update(0);
			update(1);
			update(2);
			update(3);
			update(4);
			update(5);
			update(6);
			update(7);
			update(8);


			render();
		};
		function sleep(miliseconds) {
			var currentTime = new Date().getTime();

			while (currentTime + miliseconds >= new Date().getTime()) {
			}
		}
		GameLoop();

		

	};
