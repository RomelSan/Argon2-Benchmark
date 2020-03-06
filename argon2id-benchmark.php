<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>Argon2id Benchmark by @RomelSan</title>
		<link rel="stylesheet" href="skeleton.css">
	</head>
	<body>
	
	<h1>Argon2id Benchmark</h1>
	
		<form method="get">

			<div class="row">			
			
				<div class="four columns">
					<label for="PasswordInput">Password</label>
					<input class="u-full-width" type="text" placeholder="My Password" id="inputPassword" name="password" 
					value="<?php if (isset($_GET["password"])) {echo filter_var($_GET["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);}?>">
				</div>
			</div>
			
			<div class="row">			
				<div class="three columns">
					<label for="inputTimeLimit">Time Limit (for thread)</label>
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
			</div>
			
			<div class="row">
				<div class="three columns">
					<label for="inputMemory">Memory Min</label>
					<select class="u-full-width" id="inputMemory" name="minmemory">
						<option value="1024" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==1024){echo "selected";}}?>>1 MB</option>
						<option value="2048" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==2048){echo "selected";}}?>>2 MB</option>
						<option value="4096" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==4096){echo "selected";}}?>>4 MB</option>
						<option value="8192" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==8192){echo "selected";}}?>>8 MB</option>
						<option value="16384" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==16384){echo "selected";}}?>>16 MB</option>
						<option value="32768" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==32768){echo "selected";}}?>>32 MB</option>
						<option value="65536" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==65536){echo "selected";}}?>>64 MB</option>
						<option value="131072" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==131072){echo "selected";}}?>>128 MB</option>
						<option value="262144" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==262144){echo "selected";}}?>>256 MB</option>
						<option value="524288" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==524288){echo "selected";}}?>>512 MB</option>
						<option value="1048576" <?php if (isset($_GET["minmemory"])) {if ($_GET["minmemory"]==1048576){echo "selected";}}?>>1 GB</option>
					</select>
				</div>
				
				<div class="three columns">
					<label for="inputMemory">Memory Max</label>
					<select class="u-full-width" id="inputMemory" name="maxmemory">
						<option value="1024" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==1024){echo "selected";}}?>>1 MB</option>
						<option value="2048" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==2048){echo "selected";}}?>>2 MB</option>
						<option value="4096" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==4096){echo "selected";}}?>>4 MB</option>
						<option value="8192" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==8192){echo "selected";}}?>>8 MB</option>
						<option value="16384" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==16384){echo "selected";}}?>>16 MB</option>
						<option value="32768" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==32768){echo "selected";}}?>>32 MB</option>
						<option value="65536" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==65536){echo "selected";}}?>>64 MB</option>
						<option value="131072" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==131072){echo "selected";}} if (!isset($_GET["maxmemory"])){echo "selected";}?>>128 MB</option>
						<option value="262144" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==262144){echo "selected";}}?>>256 MB</option>
						<option value="524288" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==524288){echo "selected";}}?>>512 MB</option>
						<option value="1048576" <?php if (isset($_GET["maxmemory"])) {if ($_GET["maxmemory"]==1048576){echo "selected";}}?>>1 GB</option>
					</select>
				</div>
			</div>
				
			<div class="row">
				<div class="three columns">
					<label for="inputThreads">Max Threads</label>
					<select class="u-full-width" id="inputThreads" name="threads">
						<option value="1" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==1){echo "selected";}}?>>1 Thread</option>
						<option value="2" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==2){echo "selected";}} if (!isset($_GET["threads"])){echo "selected";}?>>2 Threads</option>
						<option value="3" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==3){echo "selected";}}?>>3 Threads</option>
						<option value="4" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==4){echo "selected";}}?>>4 Threads</option>
						<option value="8" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==8){echo "selected";}}?>>8 Threads</option>
						<option value="16" <?php if (isset($_GET["threads"])) {if ($_GET["threads"]==16){echo "selected";}}?>>16 Threads</option>
					</select>
				</div>
			</div>
			
			<div class="row">
				<div class="three columns">
					<label for="inputRounds">Min Rounds</label>
					<select class="u-full-width" id="inputRounds" name="minrounds">
						<option value="1" <?php if (isset($_GET["minrounds"])) {if ($_GET["minrounds"]==1){echo "selected";}}?>>1 Round</option>
						<option value="2" <?php if (isset($_GET["minrounds"])) {if ($_GET["minrounds"]==2){echo "selected";}}?>>2 Rounds</option>
						<option value="3" <?php if (isset($_GET["minrounds"])) {if ($_GET["minrounds"]==3){echo "selected";}}?>>3 Rounds</option>
						<option value="4" <?php if (isset($_GET["minrounds"])) {if ($_GET["minrounds"]==4){echo "selected";}}?>>4 Rounds</option>
						<option value="5" <?php if (isset($_GET["minrounds"])) {if ($_GET["minrounds"]==5){echo "selected";}}?>>5 Rounds</option>
						<option value="6" <?php if (isset($_GET["minrounds"])) {if ($_GET["minrounds"]==6){echo "selected";}}?>>6 Rounds</option>
						<option value="9" <?php if (isset($_GET["minrounds"])) {if ($_GET["minrounds"]==9){echo "selected";}}?>>9 Rounds</option>
						<option value="12" <?php if (isset($_GET["minrounds"])) {if ($_GET["minrounds"]==12){echo "selected";}}?>>12 Rounds</option>
					</select>
				</div>
				
				<div class="three columns">
					<label for="inputRounds">Max Rounds</label>
					<select class="u-full-width" id="inputRounds" name="maxrounds">
						<option value="1" <?php if (isset($_GET["maxrounds"])) {if ($_GET["maxrounds"]==1){echo "selected";}}?>>1 Round</option>
						<option value="2" <?php if (isset($_GET["maxrounds"])) {if ($_GET["maxrounds"]==2){echo "selected";}}?>>2 Rounds</option>
						<option value="3" <?php if (isset($_GET["maxrounds"])) {if ($_GET["maxrounds"]==3){echo "selected";}}?>>3 Rounds</option>
						<option value="4" <?php if (isset($_GET["maxrounds"])) {if ($_GET["maxrounds"]==4){echo "selected";}} if (!isset($_GET["maxrounds"])){echo "selected";}?>>4 Rounds</option>
						<option value="5" <?php if (isset($_GET["maxrounds"])) {if ($_GET["maxrounds"]==5){echo "selected";}}?>>5 Rounds</option>
						<option value="6" <?php if (isset($_GET["maxrounds"])) {if ($_GET["maxrounds"]==6){echo "selected";}}?>>6 Rounds</option>
						<option value="9" <?php if (isset($_GET["maxrounds"])) {if ($_GET["maxrounds"]==9){echo "selected";}}?>>9 Rounds</option>
						<option value="12" <?php if (isset($_GET["maxrounds"])) {if ($_GET["maxrounds"]==12){echo "selected";}}?>>12 Rounds</option>
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
// In production the total time should be 500ms and up to 1000ms for webs. 
// Desktop applications 4 seconds (4000ms) and up. 

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
	
function benchmark($password = "test", $upperlimit = 2000, $maxthreads = 2, $minrounds = 1, $maxrounds = 4, $minmemory = 1024, $maxmemory = 262144)
	{
		if (php_sapi_name() !== 'cli' ) echo "<pre>";
		// Upper time limit to check for each thread value (in milliseconds) (Default test here is 2500)
		$upperTimeLimit = $upperlimit; // We're going to run until the time to generate the hash takes longer than this.
		
		$threads = [1];
		
		// 1,2,3,4,8,16
		if ($maxthreads == 1) { $threads = [1];}
		if ($maxthreads == 2) { $threads = [1, 2];}
		if ($maxthreads == 3) { $threads = [1, 2, 3];}
		if ($maxthreads == 4) { $threads = [1, 2, 3, 4];}
		if ($maxthreads == 8) { $threads = [1, 2, 3, 4, 5, 6, 7, 8];}
		if ($maxthreads == 16) { $threads = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];}
		
		$time_cost_min = $minrounds; // Iterations / rounds. The minimum for this in production should be at least 3
		$time_cost_max = $maxrounds;
		
		$memory_cost_min = $minmemory; //1 << 10; // 1 MB = (2^10 result in KB)
		$memory_cost_max = $maxmemory; // 256 MB = (2^18 result in KB) or 512MB (2^19 result in KB) or 1GB = (2^20 result in KB)
		
		echo "<br>Password ARGON2id Benchmark";
		echo "<br>Will run until the upper limit of {$upperTimeLimit}ms is reached for each thread value";
		echo "<br>Times are expressed in milliseconds.";
		echo "<br>t_cost means iterations (rounds)";
				
		foreach($threads as $thread) 
			{
				echo "\n\n\n=Testing with $thread threads";
				echo "\n m_cost (MB) ";
				for ($m_cost = $memory_cost_min; $m_cost <= $memory_cost_max; $m_cost *= 2) 
					{
						$m_cost_mb = $m_cost / 1024;
						echo '|' . str_pad($m_cost_mb, 5, ' ', STR_PAD_BOTH);
					}				
				echo "\n             ============================================================";
				
				for ($time_cost = $time_cost_min; $time_cost <= $time_cost_max; $time_cost++) 
					{
						echo "\n t_cost=$time_cost    ";
						for ($m_cost = $memory_cost_min; $m_cost <= $memory_cost_max; $m_cost *= 2) 
							{				
								$start = microtime(true);
								password_hash($password, PASSWORD_ARGON2ID, [
									'memory_cost' => $m_cost,
									'time_cost'   => $time_cost,
									'threads'     => $thread,
								]);
								$time = round((microtime(true) - $start) * 1000);
					
								if ($time < $upperTimeLimit) 
									{
										echo '|' . str_pad($time, 5, ' ', STR_PAD_BOTH);
									} 
								else 
									{
										echo '|' . str_pad(">LIM", 5, ' ', STR_PAD_BOTH);
										$m_cost = $memory_cost_max;
										$time_cost = $time_cost_max;
									}
					
							}
					}
			}
		echo "\n\n";
		echo "Done.";
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

	
if (isset($_GET["password"]) && isset($_GET["uppertime"]) && isset($_GET["minmemory"]) && isset($_GET["maxmemory"]) && isset($_GET["threads"]) && isset($_GET["minrounds"]) && isset($_GET["maxrounds"])) 
	{
		$input_password = filter_var($_GET["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$input_uppertime = filter_var($_GET["uppertime"], FILTER_SANITIZE_NUMBER_INT);
		$input_minmemory = filter_var($_GET["minmemory"], FILTER_SANITIZE_NUMBER_INT);
		$input_maxmemory = filter_var($_GET["maxmemory"], FILTER_SANITIZE_NUMBER_INT);
		$input_threads = filter_var($_GET["threads"], FILTER_SANITIZE_NUMBER_INT);
		$input_minrounds = filter_var($_GET["minrounds"], FILTER_SANITIZE_NUMBER_INT);
		$input_maxrounds = filter_var($_GET["maxrounds"], FILTER_SANITIZE_NUMBER_INT);
		
		echo "<br>";
		maxout();
		echo "<br><br>";
		
		// First Test (Default Settings)
		$hash = test_default($input_password);
		echo "<br>";
		
		// Real Test
		benchmark($input_password, $input_uppertime, $input_threads, $input_minrounds, $input_maxrounds, $input_minmemory, $input_maxmemory);
		
		// Verify
		echo "<br>";
		verify($input_password, $hash);
	}
?>

<?php




