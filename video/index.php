<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Canvas Fireworks</title>
    
    
    <link rel="stylesheet" href="css/bootstrap.min.css">

    
        <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      html, body {
	margin: 0;	
	padding: 0;
}

body {
	background: #171717;
	color: #999;
	font: 100%/18px helvetica, arial, sans-serif;
}

a {
	color: #2fa1d6;
	font-weight: bold;
	text-decoration: none;
}

a:hover {
	color: #fff;	
}

video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
 background: url('celebra.png') no-repeat;
  background-size: cover;
  -webkit-transition: 1s opacity;
  transition: 1s opacity;
}

#canvas-container {
	/*background: #000 url(http://jackrugile.com/lab/fireworks-v2/images/bg.jpg);*/
  height: 100vh;
	
	
	position: absolute;
	
  width: 100%;
	z-index: -1;
	
}
		
canvas {
	cursor: crosshair;
	display: block;
	position: relative;
	z-index: 99999;
}

canvas:active {
	cursor: crosshair;
}

#skyline {
	/*background: url(http://jackrugile.com/lab/fireworks-v2/images/skyline.png) repeat-x 50% 0;*/
	bottom: 0;
	height: 135px;
	left: 0;
	position: absolute;
	width: 100%;
	z-index: 1;	
}

#mountains1 {
	/*background: url(http://jackrugile.com/lab/fireworks-v2/images/mountains1.png) repeat-x 40% 0;*/
	bottom: 0;
	height: 200px;
	left: 0;
	position: absolute;
	width: 100%;
	z-index: 1;	
}

#mountains2 {
	/*background: url(https://jackrugile.com/lab/fireworks-v2/images/mountains2.png) repeat-x 30% 0;
	*/
	bottom: 0;
	height: 250px;
	left: 0;
	position: absolute;
	width: 100%;
	z-index: 1;	
}

#gui {
	right: 0;
	position: fixed;
	top: 0;
	z-index: 3;
}

.modal-content{
	box-shadow: none !important;
	background: rgba(0,0,0,0.1) !important;
}



    </style>

    
    
  </head>

  <body>


    <video autoplay  poster="celebra.png" id="bgvid" loop style="display:none;">
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<!-- <source src="//demosthenes.info/assets/videos/polina.webm" type="video/webm">
<source src="//demosthenes.info/assets/videos/polina.mp4" type="video/mp4"> -->
  <source src="video/videohd.mp4" type="video/mp4">

</video>

    <div id="gui"></div>		
<div id="canvas-container">
  <div id="mountains2"></div>
  <div id="mountains1"></div>
  <div id="skyline"></div>
</div>


<!-- Button trigger modal -->
<button type="button" id="aplica" class="btn btn-primary btn-lg" >
  Launch demo modal
</button>

<br>

<table class="table" >
	
	<?php 
	$i=0;
	while ( $i <= 15) {
		
echo "<tr><td>".rand(10,3)."</td><td>".rand(10,3)."</td><td>".rand(10,3)."</td><td>".rand(10,3)."</td></tr>";
		$i++;

	}

	

	 ?>

	<tr>
</tr>


</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <h1>MODAL</h1>
        <p>PARRAFOS</p>
        <p>MAS PARRAFOS</p>
        <p>s</p>
        <p>b</p>
      </div>
      <div class="modal-footer"  >
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



    <script src='jquery.js'></script>
<script src='js/bootstrap.min.js'></script>
        <script src="js/index.js"></script>

    <script type="text/javascript">

    $(function(){
    	var vid = document.getElementById("bgvid");

    	vid.pause();
    	$('#aplica').click(function(){

    		$('#myModal').modal();

    		

    		$('#myModal').on('shown.bs.modal', function (e) {
    			//$('#canvas-container').css('z-index',9999)
			  		inicia();
			});



    	});


    	function inicia(){

    		$('#bgvid').css('display','block');
    		vid.play();

    		fire = new Fireworks();

    		fire.init();
    	}

    	$('#myModal').on('hidden.bs.modal', function (e) {
    		$('#bgvid').css('display','none');
    			vid.stop();

			});


    	
    });

    </script>
    
    
  </body>
</html>
