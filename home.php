<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Apple devices fullscreen -->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<!-- Apple devices fullscreen -->
		<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		
		<title>GuruWS :: Free online greybox web scanner</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap responsive -->
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Color CSS -->
		<link rel="stylesheet" href="css/themes.css">


		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<!-- Nice Scroll -->
		<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>

		<!--[if lte IE 9]>
			<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
			<script>
				$(document).ready(function() {
					$('input, textarea').placeholder();
				});
			</script>
		<![endif]-->
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" />
		<!-- Apple devices Homescreen icon -->
		<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

		<script type="text/javascript">
		    function PreviewImage() {
		        var oFReader = new FileReader();
		        oFReader.readAsDataURL(document.getElementById("sourcecode").files[0]);

		        oFReader.onload = function (oFREvent) {
		            document.getElementById("uploadPreview").value = "Press scan button..."; //oFREvent.target.result;
		            $("#scanbutton").removeClass('hidden'); //oFREvent.target.result;
		        };
		    };

		    function showUploadBar(){
		    	$("#uploadBar").removeClass('hidden');
		    }
		</script>
		<style type="text/css">
			#footer {
				position: fixed;
				width: 100%;
				bottom: 0;
			}
			body { background:  url("img/bg.png") !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
		</style>

		<!-- FOR UPLOAD BAR -->
		<style>
			.progress { position:relative; width:300px; border: 1px solid #FF7800; padding: 1px; border-radius: 3px; }
			.bar { background-color: #FF7800; width:0%; height:20px; border-radius: 3px; }
			.percent { position:absolute; display:inline-block; top:2px; left:48%; }
		</style>

	</head>
	<body class='error'>		
		<div class="container-fluid" id="content">
			<div class="wrapper">		
				<div class="code" align="center">
					<img src="img/logo.png" alt="" class='retina-ready' width="380">
				</div>				
				<div class="desc" align="center">
					<font size="3px">
						Free online greybox web scanner
					</font>
				</div>
				<hr/>
				<form action="upload.php" class='form-horizontal' method="post" enctype="multipart/form-data">
					<div class="input-append">
						<input type="text" name="search" id="uploadPreview" placeholder="Select a compressed file...">						
						<span class="btn btn-file">
							<span class="fileupload-new">
								<i class="icon-folder-close"></i>
							</span>
							<input type="file" name="userFile" id="sourcecode" onchange="PreviewImage();" />
						</span>
					</div>
					<br><br>
					<div class="buttons" align="center">
						<div class="pull-center">
							<button class="btn btn-success btn hidden" onclick="showUploadBar()" id="scanbutton" type="submit" name="submit">SCAN <i class="icon-search"></i></button>
						</div>
					</div>
				</form>			
				<div class="progress hidden" id="uploadBar"> <!-- hidden -->
	        <div class="bar"></div >
	        <div class="percent">0%</div >
			  </div>
			  <p id="errorMessage" class="hidden"></p>
			</div>
		</div>
		<div id="footer">
			<div class="container">
			<p>Powered by GuruWS Team<span class="font-grey-4">|</span> <a href="#">Contact</a> <span class="font-grey-4">|</span> <a href="#">Donate</a> 
			</p>
			</div>
			<a href="#" class="gototop"><i class="icon-arrow-up"></i></a>
		</div>
	</body>

	<!-- FOR UPLOAD BAR -->
	<script src="js/jquery.form.js"></script>
	<script>
		(function() {
		var bar = $('.bar');
		var percent = $('.percent');
		var status = $('#status');
		   
		$('form').ajaxForm({
		    beforeSend: function() {
		        status.empty();
		        var percentVal = '0%';
		        bar.width(percentVal)
		        percent.html(percentVal);
		    },
		    uploadProgress: function(event, position, total, percentComplete) {
		        var percentVal = percentComplete + '%';
		        bar.width(percentVal)
		        percent.html(percentVal);
		    //console.log(percentVal, position, total);
		    },
		    success: function() {
		        var percentVal = '100%';
		        bar.width(percentVal)
		        percent.html(percentVal);
		        // window.location.href = "/376"; 
		    },
		  complete: function(xhr) {
		  	// console.log(xhr.responseText);
		    if ($.trim(xhr.responseText) == "1") {
		    	window.location.href = "./result.php";
		    }else{
		    	// $("#uploadBar").addClass('hidden');
		    	$("#errorMessage").removeClass('hidden');
		    	document.getElementById("errorMessage").innerHTML = xhr.responseText;
		    }
		    // console.log(xhr.responseText);
		  }
		}); 

		})();       
	</script>
</html>
