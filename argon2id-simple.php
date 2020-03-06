<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>Argon2id Simple Test by @RomelSan</title>
		<link rel="stylesheet" href="skeleton.css">
	</head>
	<body>
	
	<h1>Argon2id Test</h1>
	
		<form method="get">

			<div class="row">					
				<div class="three columns">
					<label for="PasswordInput">Password</label>
					<input class="u-full-width" type="text" placeholder="My Password" id="inputPassword" name="password" 
					value="<?php if (isset($_GET["password"])) {echo filter_var($_GET["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);}?>">
				</div>				
			</div>	
			
			<div class="row">
				<div class="two columns">
					<label for="inputMemory">Memory</label>
					<select class="u-full-width" id="inputMemory" name="memory">
						<option value="65536" <?php if (isset($_GET["memory"])) {if ($_GET["memory"]==65536){echo "selected";}}?>>64 MB</option>
						<option value="131072" <?php if (isset($_GET["memory"])) {if ($_GET["memory"]==131072){echo "selected";}}?>>128 MB</option>
						<option value="262144" <?php if (isset($_GET["memory"])) {if ($_GET["memory"]==262144){echo "selected";}}?>>256 MB</option>
						<option value="524288" <?php if (isset($_GET["memory"])) {if ($_GET["memory"]==524288){echo "selected";}}?>>512 MB</option>
						<option value="1048576" <?php if (isset($_GET["memory"])) {if ($_GET["memory"]==1048576){echo "selected";}}?>>1 GB</option>
					</select>
				</div>
				
				<div class="two columns">
					<label for="inputThreads">Threads</label>
					<select class="u-full-width" id="inputThreads" name="threads">
						<option value="1" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==1){echo "selected";}}?>>1 Thread</option>
						<option value="2" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==2){echo "selected";}}?>>2 Threads</option>
						<option value="3" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==3){echo "selected";}}?>>3 Threads</option>
						<option value="4" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==4){echo "selected";}}?>>4 Threads</option>
						<option value="8" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==8){echo "selected";}}?>>8 Threads</option>
						<option value="16" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==16){echo "selected";}}?>>16 Threads</option>
					</select>
				</div>
						
				<div class="two columns">
					<label for="inputRounds">Rounds</label>
					<select class="u-full-width" id="inputRounds" name="rounds">
						<option value="1" <?php if (isset($_GET["rounds"])) {if ($_GET["rounds"]==1){echo "selected";}}?>>1 Round</option>
						<option value="2" <?php if (isset($_GET["rounds"])) {if ($_GET["rounds"]==2){echo "selected";}}?>>2 Rounds</option>
						<option value="3" <?php if (isset($_GET["rounds"])) {if ($_GET["rounds"]==3){echo "selected";}}?>>3 Rounds</option>
						<option value="4" <?php if (isset($_GET["rounds"])) {if ($_GET["rounds"]==4){echo "selected";}} if (!isset($_GET["rounds"])){echo "selected";}?>>4 Rounds</option>
						<option value="5" <?php if (isset($_GET["rounds"])) {if ($_GET["rounds"]==5){echo "selected";}}?>>5 Rounds</option>
						<option value="6" <?php if (isset($_GET["rounds"])) {if ($_GET["rounds"]==6){echo "selected";}}?>>6 Rounds</option>
						<option value="9" <?php if (isset($_GET["rounds"])) {if ($_GET["rounds"]==9){echo "selected";}}?>>9 Rounds</option>
						<option value="12" <?php if (isset($_GET["rounds"])) {if ($_GET["rounds"]==12){echo "selected";}}?>>12 Rounds</option>
					</select>
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
// USE PASSWORD_ARGON2I for PHP 7.2
// USE PASSWORD_ARGON2ID for PHP 7.3+
function test_default($password)
	{
		echo "<B>Testing default values</B><br>";
		$start = microtime(true);
		$hash = password_hash($password, PASSWORD_ARGON2ID); // actual operation
		$time = round((microtime(true) - $start) * 1000);
		echo($hash);
		echo "<br>";
		echo "Time with default settings: " . $time . "ms";
		echo "<br>";
		//var_dump(password_get_info($hash));
		return $hash;
	} 
	
function test_custom($password, $memory, $threads, $rounds)
	{
		$memory_human = $memory / 1024;
		echo "<B>Testing $memory_human MB, $rounds Rounds, $threads Threads</B><br>";
		$options = [
			'memory_cost' => $memory, //1<<17, // 128 Mb = 2 square 17 = 1024 * 128
			'time_cost'   => $rounds,
			'threads'     => $threads,
		];
		$start = microtime(true);
		$hash = password_hash($password, PASSWORD_ARGON2ID, $options); // actual operation
		$time = round((microtime(true) - $start) * 1000);
		echo($hash);
		echo "<br>";
		echo "Time with default settings: " . $time . "ms";
		echo "<br>";
		//var_dump(password_get_info($hash));
	}
	
function verify($password, $hash)
	{
		echo "<B>Testing password: $password</B><br>";
		if(password_verify($password, $hash)) 
			{
				echo "Password is OK 100%";
			}
		else 
			{
				echo "Password is not OK";
			}
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

	
if (isset($_GET["memory"]) && isset($_GET["threads"]) && isset($_GET["rounds"]) && isset($_GET["password"])) 
	{
		$input_password = filter_var($_GET["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$input_memory = filter_var($_GET["memory"], FILTER_SANITIZE_NUMBER_INT);
		$input_threads = filter_var($_GET["threads"], FILTER_SANITIZE_NUMBER_INT);
		$input_rounds = filter_var($_GET["rounds"], FILTER_SANITIZE_NUMBER_INT);
		
		echo "<br>";
		maxout();
		echo "<br><br>";
		
		// First Test (Default Settings)
		$hash = test_default($input_password);
		echo "<br>";
		
		// Real Test
		test_custom($input_password, $input_memory, $input_threads, $input_rounds);
		
		// Verify
		echo "<br>";
		verify($input_password, $hash);
	}
?>
