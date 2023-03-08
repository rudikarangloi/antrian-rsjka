<?php
require "../constant.php";
?>

<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>Panggilan : ANTRIAN</title>
	    <link href="../assert/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../assert/css/jumbotron-narrow-monitoring.css" rel="stylesheet">
		<script src="../assert/js/jquery.min.js"></script>
		
		
		<style>
			h1 {			  
			    font-family: "Arial Narrow";	
							
			}
		</style>
	</head>
  	<body>
    <div class="container">
    	<center>
	    	<div class="blog-header">
			    <img src="../assert/img/logorsud.png" width="100px;" style="margin: 8px;">
				
		    </div>
	    
      	<div class="row">
		
			<div class=col-lg-3>
				<button class="btn btn-small btn-primary" type="button" style="float:left;padding:20px;" onclick="repeatData(1)">
					Panggil Ulang  &nbsp;<span class="glyphicon glyphicon-volume-up"></span>   
				</button>	
				<div class="jumbotron" >					
					<h1 class="next_number1">0</h1>				
                    <font size=2><button class="btn btn-primary next1" type="button" onclick="sendData(1)">Ruang 1</button></font>
				</div>
			</div>
			
			<div class=col-lg-3>
				<button class="btn btn-small btn-primary" type="button" style="float:left;padding:20px;" onclick="repeatData(2)">
					Panggil Ulang  &nbsp;<span class="glyphicon glyphicon-volume-up"></span>   
				</button>
				<div class="jumbotron" >
					<h1 class="next_number2">0</h1>	
                    <font size=2><button class="btn btn-primary next2" type="button"  onclick="sendData(2)">Ruang 2</button></font>
				</div>
			</div>

				
			<div class=col-lg-3>
				<button class="btn btn-small btn-primary" type="button" style="float:left;padding:20px;" onclick="repeatData(3)">
					Panggil Ulang  &nbsp;<span class="glyphicon glyphicon-volume-up"></span>   
				</button>
				<div class="jumbotron" >
					<h1 class="next_number3">0</h1>	
                    <font size=2><button class="btn btn-primary next3" type="button" onclick="sendData(3)">Ruang 3</button></font>
				</div>
			</div>
			
			<div class=col-lg-3>
				<button class="btn btn-small btn-primary" type="button" style="float:left;padding:20px;" onclick="repeatData(4)">
					Panggil Ulang  &nbsp;<span class="glyphicon glyphicon-volume-up"></span>   
				</button>
				<div class="jumbotron" >
					<h1 class="next_number4">0</h1>	
                    <font size=2><button class="btn btn-primary next4" type="button" onclick="sendData(4)">Ruang 4</button></font>
				</div>
			</div>
			
			
			<h3 id="init_max_queque">0</h3>
			</center>
			
			
			
			
      	</div>
	    
      <footer class="footer">
        <center><p>&copy; <?php echo $owner_name;?> <?php echo date("Y");?></p></center>
      </footer> 
    </div>
  	</body>
	<?php
		
	include "../apps/mysql_connect.php";
	
	$result = $mysqli->query('SELECT description FROM loket_antrian ORDER BY client'); 
	while ($rows = $result->fetch_array()) {	
		$result_array[] = $rows['description'];
	}
	
    $json_array = json_encode($result_array);
	?>
  	<script type="text/javascript">
	$("document").ready(function(){
		var tmp_loket=0;
		var gg= <?php echo $json_array; ?>	
	
		setInterval(function() {
			$.post("../apps/monitoring-data_ruang_jiwa.php", function( data ){				
				$("#init_max_queque").html('Antrian teratas ' + data["init_max_queque"] +' dari ' + data["init_count_queque"]);	
			}, "json"); 
		}, 1000);

		$.post( "../apps/admin_gateway_loket_multi_last_loket_ruang_jiwa.php", {"nomor_loket": 1}, function( data ) {
			$(".next_number1").html(data['next']);			
		},"json");

		$.post( "../apps/admin_gateway_loket_multi_last_loket_ruang_jiwa.php", {"nomor_loket": 2}, function( data ) {
			$(".next_number2").html(data['next']);			
		},"json");
		
		$.post( "../apps/admin_gateway_loket_multi_last_loket_ruang_jiwa.php", {"nomor_loket": 3}, function( data ) {
			$(".next_number3").html(data['next']);			
		},"json");
		
		$.post( "../apps/admin_gateway_loket_multi_last_loket_ruang_jiwa.php", {"nomor_loket": 4}, function( data ) {
			$(".next_number4").html(data['next']);			
		},"json");
		
		
		
	});
	
	function sendData(valueId){
		
			var next_current = 0;
			var next_repeat = 0;
			var nomor_loket = valueId;
			var ganti_nomor_loket = "";				
			
			$.post( "../apps/admin_gateway_loket_multi_ruang_jiwa.php", {"next_current": next_current,"next_repeat": next_repeat,"nomor_loket": nomor_loket}, function( data ) {
				if(data['peringatan'] == 1){					
				}
				if(data['peringatan_absen'] != 0){					
				}
				
				ganti_nomor_loket = data['ganti_nomor_loket'];
				$(".next_number"+ganti_nomor_loket).html(data['next']);
				
			},"json");   
	
	
	}
	
	function repeatData(valueId){	
	
			var next_current = $(".next_number"+valueId).text();
			var next_repeat  = $(".next_number"+valueId).text();	
			var nomor_loket  = valueId;
			
			$.post( "../apps/admin_gateway_loket_multi_ruang_jiwa.php", {"next_current": next_current,"next_repeat": next_repeat,"nomor_loket": nomor_loket}, function( data ) {
				if(data['peringatan'] == 1){
					$('#peringatan').show();
				}
				//$(".next").html(data['next']);
				ganti_nomor_loket = data['ganti_nomor_loket'];
				$(".next_number"+ganti_nomor_loket).html(data['next']);
			},"json");
			
	}
		
	
	
	
	</script>
</html>

