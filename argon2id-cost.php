<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>Argon2id Cost Calculator by @RomelSan</title>
		<link rel="stylesheet" href="skeleton.css">
	</head>
	<body>
	
	<h1>Argon2id Cost Calculator</h1>
	
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
					<label for="inputTimeLimit">Time Limit</label>
					<select class="u-full-width" id="inputTimeLimit" name="uppertime">
						<option value="500" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==500){echo "selected";}}?>>Half Second</option>
						<option value="1000" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==1000){echo "selected";}} if (!isset($_GET["uppertime"])){echo "selected";}?>>1 Second</option>
						<option value="2000" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==2000){echo "selected";}}?>>2 Seconds</option>
						<option value="3000" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==3000){echo "selected";}}?>>3 Seconds</option>
						<option value="4000" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==4000){echo "selected";}}?>>4 Seconds</option>
						<option value="5000" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==5000){echo "selected";}}?>>5 Seconds</option>
						<option value="6000" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==6000){echo "selected";}}?>>6 Seconds</option>
						<option value="7000" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==7000){echo "selected";}}?>>7 Seconds</option>
						<option value="8000" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==8000){echo "selected";}}?>>8 Seconds</option>
						<option value="9000" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==9000){echo "selected";}}?>>9 Seconds</option>
						<option value="10000" <?php if (isset($_GET["uppertime"])) {if ($_GET["uppertime"]==10000){echo "selected";}}?>>10 Second</option>
					</select>
				</div>

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
	
function test_cost($password = "test", $upperTimeLimit = 1000, $threads = 1, $memory = 65536)
	{
		if (php_sapi_name() !== 'cli' ) echo "<pre>";
		echo "\nPassword Argon2id Hash Cost Calculator\n\n";
		echo "We're going to run until the time to generate the hash takes longer than {$upperTimeLimit}ms\n";
		
		$cost = 0; // rounds (leave it 0 because it will auto increment accordingly)
		$first_cost_above_100 = null;
		$first_cost_above_500 = null;
			
		do 
			{
				$cost++;
				
				echo "\nTesting cost value of $cost: ";
				
				$start = microtime(true);
				//$hash = password_hash($password, PASSWORD_ARGON2ID, array('time_cost' => $cost)); // Default Test
				$hash = password_hash($password, PASSWORD_ARGON2ID, array('time_cost' => $cost, 'threads' => $threads, 'memory_cost' => $memory));
				$time = round((microtime(true) - $start) * 1000);
				
				echo "... took {$time}ms";	
				echo " Hash: "; var_dump($hash); // HASH DUMP (Optional, comment if you don't want to see the hash data.)
				
				if ($first_cost_above_100 === null && $time > 100) 
					{
						$first_cost_above_100 = $cost;
					} 
				else if ($first_cost_above_500 === null && $time > 500) 
					{
						$first_cost_above_500 = $cost;
					}
				
			} 
		while ($time < $upperTimeLimit);
		echo "\n\nYou should use a cost between $first_cost_above_100 and $first_cost_above_500";
		if (php_sapi_name() !== 'cli' ) echo "</pre>";
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

	
if (isset($_GET["memory"]) && isset($_GET["threads"]) && isset($_GET["password"]) && isset($_GET["uppertime"])) 
	{
		$input_password = filter_var($_GET["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$input_memory = filter_var($_GET["memory"], FILTER_SANITIZE_NUMBER_INT);
		$input_threads = filter_var($_GET["threads"], FILTER_SANITIZE_NUMBER_INT);
		$input_uppertime = filter_var($_GET["uppertime"], FILTER_SANITIZE_NUMBER_INT);
		
		echo "<br>";
		maxout();
		echo "<br><br>";
		
		// First Test (Default Settings)
		$hash = test_default($input_password);
		echo "<br>";
		
		// Real Test
		test_cost($input_password, $input_uppertime, $input_threads, $input_memory);
		
		// Verify
		echo "<br>";
		verify($input_password, $hash);
	}
?>