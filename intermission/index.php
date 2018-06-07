<?php 

$refresh=rand(1,2); 

header("Refresh:$refresh");

include_once("intermissionstart.php");
include_once("timefunctions.php");
include_once("defaults.php");

$now=time();

$intermissionStart=intermissionStartTime($startfile);
$elapsedTime=$now-$intermissionStart;

$intermissionDurration=intermissionDurration($durrfile);
$intermissionTimeLeft=$intermissionDurration-$elapsedTime;

$intermissionReason=intermissionReason($reasonfile);

$startString=date("D Y F j H:i:s", $intermissionStart);
$nowString=date("D Y F j H:i:s", $now);
$durrString=time_elapsed_A($intermissionDurration);
$elapsedString=time_elapsed_A($elapsedTime);
$leftString=time_elapsed_A($intermissionTimeLeft);
$reasonString=$intermissionReason;


?>
<!doctype html>
<html>
<head>
	<title>Stream Intermission</title>
	<meta http-equiv="refresh" content="<?php echo $refresh; ?>">
</head>
<body>
	<h1>Stream is on Intermission</h1>
	<p>This stream is currently on intermission</p>
	<p>Sadly, this intermission page isn't setup correctly, so you get limited information</p>
	<h2>Intermission Details</h2>
	<ul>
		<li>Intermission Reason: <?php echo $reasonString; ?></li>
		<li>Intermission Start: <?php echo $startString; ?></li>
		<li>Current Time: <?php echo $nowString; ?></li>
		<li>Intermission Durration: <?php echo $durrString; ?></li>
		<li>Time Elapsed: <?php echo $elapsedString; ?></li>
		<li>Expected Return: <?php echo $leftString; ?></li>
		<li>Refreshing in: <?php echo $refresh; ?> seconds</li>
	</ul>
</body>
</html>
