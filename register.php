<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Apple devices fullscreen -->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<!-- Apple devices fullscreen -->
		<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		
		<title>GuruWS :: Free online greybox web scanner :: Scan Vulnerability and Detect WebShell/Backdoor</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- Bootstrap responsive -->
		<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css">
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<!-- Color CSS -->
		<link rel="stylesheet" href="assets/css/themes.css">


		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		<!-- Nice Scroll -->
		<script src="assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
		<!-- Bootstrap -->
		<script src="assets/js/bootstrap.min.js"></script>

		<!--[if lte IE 9]>
			<script src="assets/js/plugins/placeholder/jquery.placeholder.min.js"></script>
			<script>
				$(document).ready(function() {
					$('input, textarea').placeholder();
				});
			</script>
		<![endif]-->
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.ico" />
		<!-- Apple devices Homescreen icon -->
		<link rel="apple-touch-icon-precomposed" href="assets/img/apple-touch-icon-precomposed.png" />

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
		    	$("#scanbutton").addClass('hidden');
		    	$("#uploadBar").removeClass('hidden');
		    }
		</script>
		<style type="text/css">
			#footer {
				position: fixed;
				width: 100%;
				bottom: 0;
			}
			body { background:  url("assets/img/bg.png") !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
		</style>

		<!-- FOR UPLOAD BAR -->
		<style>
			.progress { position:relative; width:300px; border: 1px solid #FF7800; padding: 1px; border-radius: 3px; }
			.bar { width:0%; height:20px; border-radius: 3px; }
			.percent { position:absolute; display:inline-block; top:2px; left:48%; }
		</style>

	</head>
	<body class='error'>						

		<div class="container-fluid" id="content">
			<div class="wrapper">
				<div class="code" align="center">
					<img src="assets/img/logo.png" alt="" class='retina-ready' width="420">
					<div class="desc" align="left">
					<p style="font-size:1.0em">
						Chúng tôi sẽ liên tụp kiểm tra hoạt động của trang web của bạn. Trong trường hợp Website của bạn có những dấu hiệu bất thường như bị tấn công ngừng hoạt động hoặc bị hack... chúng tôi sẽ thông báo ngay lập tức cho bạn qua email !
					</p>
				</div>
				</div>			
				<div class="login-body">					
					<form action="index.html" method='get' class='form-validate' id="test">
						<div class="control-group">
							<div class="pw controls">
								<input type="text" name="uname" placeholder="Your name" class='input-block-level' data-rule-required="true">
							</div>
						</div>
						<div class="control-group">
							<div class="email controls">
								<input type="text" name='uemail' placeholder="Email address" class='input-block-level' data-rule-required="true" data-rule-email="true">
							</div>
						</div>
						<div class="control-group">
							<div class="pw controls">
								<input type="text" name="uwebsite" placeholder="Your Website" class='input-block-level' data-rule-required="true">
							</div>
						</div>						
						<div class="submit">							
							<input type="submit" value="ĐĂNG KÝ" class='btn btn-primary'>
						</div>
					</form>					
				</div>
			</div>
		</div>
		<div id="footer">			
			<div class="container">
			<p>Powered by Guru Team<span class="font-grey-4">|</span> <a href="register.php">Đăng ký kiểm tra trạng thái website</a><span class="font-grey-4">|</span> <a href="contact">Contact</a> <span class="font-grey-4">|</span> <a href="donate">Donate</a> 
			</p>
			</div>
			<a href="#" class="gototop"><i class="icon-arrow-up"></i></a>
		</div>
	</body>

	<!-- FOR UPLOAD BAR -->
	<script src="assets/js/jquery.form.js"></script>
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
