<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>Argon2 Verify by @RomelSan</title>
		<link rel="stylesheet" href="skeleton.css">
	</head>
	<body>
	
	<h1>Argon2i Password Verify</h1>
	
		<form method="get">

			<div class="row">				
				<div class="three columns">
					<label for="PasswordInput">Password</label>
					<input class="u-full-width" type="text" placeholder="My Password" id="inputPassword" name="password"
					value="<?php if (isset($_GET["password"])) {echo filter_var($_GET["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);}?>">
				</div>
			</div>	
			<div class="row">
				<div class="six columns">
					<label for="HashInput">Hash</label>
					<input class="u-full-width" type="text" placeholder="My Hash" id="inputHash" name="hash"
					value="<?php if (isset($_GET["hash"])) {echo filter_var($_GET["hash"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);}?>">
				</div>				
			</div>
			
			<input class="button-primary" type="submit" value="Initiate">
		</form>
		
		Default Max Execution Time: <?php echo ini_get('max_execution_time');?> seconds
		<br>
		Default Max Memory Limit: <?php echo ini_get('memory_limit');?>
		<br>
	</body>
</html>

<?php
function verify($password, $hash)
	{
		echo "<B>Testing password: $password</B><br>";
		$start = microtime(true);
		if(password_verify($password, $hash)) 
			{
				echo "Password is OK 100%";
			}
		else 
			{
				echo "Password is not OK, BAD.";
			}
		$time = round((microtime(true) - $start) * 1000);
		echo "<br>";
		echo "Time Elapsed: " . $time . "ms";
	}
	
function maxout()
	{
		// Set Max time and Max Memory	
		ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
		ini_set('memory_limit', '1024'); //1024 MB = 1 GB
		echo "Temporal Max Execution Time: " . ini_get('max_execution_time') . " seconds";
		echo "<br>";
		echo "Temporal Max Memory Limit: " . ini_get('memory_limit') . " MB";

	}

	
if (isset($_GET["password"]) && isset($_GET["hash"])) 
	{
		$input_password = filter_var($_GET["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$input_hash = filter_var($_GET["hash"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		
		echo "<br>";
		maxout();
		echo "<br><br>";
		
		// Verify
		verify($input_password, $input_hash);
	}
?>
