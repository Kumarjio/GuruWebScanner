<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<mysqli_real_escape_stringa name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Apple devices fullscreen -->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<!-- Apple devices fullscreen -->
		<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		
		<title>GuruWS :: Free online greybox web scanner</title>

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
    	<!-- Easy Modal for bootstrap -->
    	<script src="//rawgit.com/saribe/eModal/master/dist/eModal.min.js"></script>
    	 <!-- Innitial popover of bootstrap -->
	    <style type="text/css">
	    /* The max width is dependant on the container */
	      .popover{
	          max-width: 100%; /* Max Width of the popover (depending on the container!) */
	      }
	    </style>
	    <script>
	      $(document).ready(function(){
	        $('[data-toggle="popover"]').popover({animation: true, placement: "top", delay: {show: 100, hide: 100}});   
	        // $("html").niceScroll();
	      });
	    </script>
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
	
	</head>

	<body>
		<?php include("connectdb.php"); ?>
		<div id="navigation">
			<div class="container-fluid">
				<a href="./"><img src="assets/img/logowhite.jpg" alt="" class='retina-ready' width="200px"></a>				
			</div>
		</div>
		<hr/>
		
		<?php
		//For DEBUG purpose
		// ini_set('display_errors',1); 
		// error_reporting(E_ALL);
	    //////////////////////////////////

		  $report = 0;

	    if (isset($_GET["id"])) {
	    	if(is_array($_GET["id"])) die();
	    	$con = ConnectDB() or die("can't connect to DB");
	    	$id = mysqli_real_escape_string($con, preg_replace('/\s+/', '', $_GET["id"])); //preg_replace to remove all space
	    	$query = mysqli_query($con,"SELECT * FROM reports WHERE shareID='$id'") or die(mysqli_error($con));
	    	$row = mysqli_fetch_array($query);
        
        if(!empty($row['newFilename'])){
          $newFilename = $row['newFilename'];
          $query = mysqli_query($con,"SELECT status FROM vulScanProgress WHERE newFilename='$newFilename'") or die(mysqli_error($con));
          $scanStatus = mysqli_fetch_row($query)[0];
        	$filename = $row['filename'];
        	$fileCheckSum = $row['sha1hash'];
        	$scanTime = $row['scantime'];
        	$newFilename = $row['newFilename'];

        	$resultFile = "./userFiles/".$newFilename.".result";

  				//nl2br function to end line as proper
  				$resultContent = nl2br(htmlspecialchars(file_get_contents($resultFile))); 

  				//The PREG_SET_ORDER flag to ensure result appropriately distribute to array
  				preg_match_all('/^(.*?)VULNERABILITY FOUND ([\s\S]*?)----------/m', $resultContent, $matches, PREG_SET_ORDER);

  				$wshellResultFile = "./userFiles/".$newFilename.".wshell";
  				$wshellResultContent = nl2br(htmlspecialchars(file_get_contents($wshellResultFile))); //nl2br function to end line as proper          
          preg_match_all('/behavior found in:(.*?)(Suspicious|clearer)/', $wshellResultContent, $wshellmatches, PREG_SET_ORDER);  //The PREG_SET_ORDER flag to ensure result appropriately distribute to array                    
          preg_match_all('/suspicious files found and (.*) shells found/', $wshellResultContent, $trueWshellmatches, PREG_SET_ORDER);  //The PREG_SET_ORDER flag to ensure result appropriately distribute to array                    
          preg_match_all('!\d+!', $trueWshellmatches[0][1], $numberOfWshell);
  				$report = 1;
  			}
		  }
		?>
		<?php if($report == 1){ ?>



		<div class="container-fluid" id="content">		
			<div id="main">
				<div class="container-fluid">				
					<div class="row-fluid">
						<div class="span10">
							<div class="box box-color box-bordered">
								<div class="box-title">								
									<h3><center>
										<i class="icon-table"></i>
										REPORT
										</center>
									</h3>								
								</div>
								<font size="2px" face="Verdana">
								<div class="box-content nopadding">
									<table class="table table-hover table-nomargin">
										<thead>
											<tr>
												<th>[+] File name:</th>
												<th>
													<font face="Consolas"><b>
														<?php echo $filename; ?>
													</b></font>
												</th>											
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>[+] SHA-1 hash:</td>
												<td>
													<font face="Consolas"><b>
														<?php echo $fileCheckSum; ?>
													</b></font>
												</td>											
											</tr>
											<tr>
												<td>[+] Total scaned time:</td>
												<td>
													<font face="Consolas"><b>
														<?php echo $scanTime/1000; ?> second
													</b></font>
												</td>											
											</tr>										
											<tr>
												<td>[+] Vulnerabilities Scanner:</td>
												<td>
													<font face="Consolas"><b>
                            <?php
                                if($scanStatus == 0 or $scanStatus == -1) {
                                    echo "On scanning progress, comeback later to see your result.<br>(Keep the share link below to view result later)";
                                } else {
                                    echo count($matches);
                                    echo " vulnerabilities";  
                                }
                                
                                /* grMalwrScanner here */
                                $grGmsFile = $wshellResultFile = "./userFiles/".$newFilename.".gms";
                                $grGmsContent = file_get_contents($grGmsFile);
                                $grShellResult = json_decode($grGmsContent, true);
                            ?>

                          </b></font>
												</td>											
											</tr>
											<?php 
                      if($scanStatus == 1){
  											foreach ($matches as $value) {
  	    										echo '<tr>
  														<td></td>
  														<td style="word-wrap: break-word;min-width: 40px;max-width: 40px;">
  														<font face="Consolas"><b>';
  	    										echo substr(preg_replace('/\/var(.*?)'.$newFilename.'/m', '', $value[0]), 0, -13); 
  	    										echo '</b></font>
  	    												</td>											
  														</tr>';
                        }
											}
											?>
											<!-- Innitial ajax analytic modal -->
                        <script>
                           var options = {
                                url: "./userFiles/<?php echo $newFilename; ?>.analytics",
                                title:'Result',
                                size: 'lg',
                                loadingHtml: '<span class="fa fa-circle-o-notch fa-spin fa-3x text-primary"></span><span class="h4">Loading</span>',
                                subtitle: 'More advanced analytics',
                            };
                        </script>
                        
                        <tr>
                            <td>[+] Malware Scanner:</td>
                            <td>
                              <font face="Consolas"><b>
                                <?php
                                  if($scanStatus == 0 or $scanStatus == -1){
                                    echo "<div id='wait'>On scanning progress, comeback later to see your result.<br>(Keep the share link below to view result later)</div>";
                                  }
                                  else {
                                    echo count($grShellResult['dfunc']);
                                    echo " suspicious files, ";
                                    echo count($grShellResult['webshell']); 
                                    echo " shells found!";
                                  }
                                ?>
                              </b>
                              (<a style="cursor:pointer;" onclick="eModal.ajax(options);">More advanced analytics</a>)</font>
                            </td>                     
                          </tr>
                          <?php 
                            foreach ($grShellResult['webshell'] as $grShell) {
                              echo '<tr>
                                <td></td>
                                <td style="word-wrap: break-word;min-width: 40px;max-width: 40px;">
                                <font face="Consolas">';                     
                              echo '<b>Webshell found in: <a>' . $grShell['filename'] . '</a></b><br>';
                              echo 'Full path: ' . $grShell['url'] . '</b><br>';                      
                              echo 'Fingerprint: <b style="color:red">'. $grShell['shellname'] .'</b>';
                            
                              echo '</font>
                                  </td>                     
                                </tr>';
                            }

                            foreach ($grShellResult['dfunc'] as $grDfunc) {
                              echo '<tr>
                                <td></td>
                                <td style="word-wrap: break-word;min-width: 40px;max-width: 40px;">
                                <font face="Consolas">';                     
                              echo '<b>Suspicious behavior found in:</b><br>';
                              echo 'Full path: ' . $grDfunc['url'] . ' <b>[' . $grDfunc['line'] . ']</b> ' . '<br>';              
                              echo 'Function: <b style="color:orange">' . $grDfunc['function'] . '</b><br>';                                                                       
                              echo '</font>
                                  </td>                     
                                </tr>';
                            }
                        ?>
                      <tr>
                        <td>[+] Link to share:</td>                     
                        <td>
                          <font face="Consolas"><b>
                            <a href="./share.php?id=<?php echo $id ?> " >http://guru.ws/share.php?id=<?php echo $id ?>
                          </b></font>
                        </td>                     

                      </tr>

										</tbody>
									</table>								
									<hr/>
									<!-- <div align="center">
										<form action="" class='form-horizontal'>									
										<button name="rescan" type='submit' class='btn btn btn-success'><i class="icon-search"></i> RESCAN</button>								
										<button name="print" type='submit' class='btn btn btn-primary'>PRINT <i class="icon-print"></i></button>				
										</form>
									</div> -->
								</div>							
							</div>
							</font>
						</div>
					</div>				
				</div>
			</div>
		</div>
		<?php } ?>
		<hr/>
		<div id="footer">
			<div class="container">
			<p>Powered by GuruWS Team<span class="font-grey-4">|</span> <a href="#">Contact</a> <span class="font-grey-4">|</span> <a href="#">Donate</a> 
			</p>
			</div>
			<a href="#" class="gototop"><i class="icon-arrow-up"></i></a>
		</div>
		
	</body>

</html>

