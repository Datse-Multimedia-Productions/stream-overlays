<?php 

include_once("intermissionstart.php");
include_once("defaults.php");
include_once("timefunctions.php");

$multiplier = array(
	"seconds" => 0,
	"minutes" => 60,
	"hours" => 3600,
	"days" => 3600*24,
	"months" => 3600*24*30.5,
	"years" => 3600*24*30.5*12
);

if (isset($_POST["value"]) && isset($_POST["units"])) {
	$value=$_POST["value"];
	$units=$_POST["units"];
	$durration=$value*$multiplier[$units]+rand(0,$multiplier[$units]);
	startIntermission($startfile, $durrfile, $durration);
}

$self=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$now=time();

$intermissionStart=intermissionStartTime($startfile);

$elapsedTime=$now-$intermissionStart;

$intermissionDurration=intermissionDurration($durrfile);

$intermissionTimeLeft=$intermissionDurration-$elapsedTime;

$startString=date("D Y F j H:i:s", $intermissionStart);
$nowString=date("D Y F j H:i:s", $now);
$durrString=time_elapsed_A($intermissionDurration);
$elapsedString=time_elapsed_A($elapsedTime);
$leftString=time_elapsed_A($intermissionTimeLeft);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Set the new intermissioin</title>
</head>
<body>
	<h1>Set the new intermission</h1>
	<p>This will set the new intermission</p>

	<form action="<?php $selfi ?>" method="post">
		<label for="value">Value:</label>
		<input id="value" type="text" name="value">
		<label for="units">Units:</label>
		<select id="units" name="units">
			<option value="seconds">Seconds</option>
			<option value="minutes">Minutes</option>
			<option value="hours">Hours</option>
			<option value="days">Days</option>
			<option value="months">Months</option>
			<option value="years">Years</option>
		</select>
		<input type="submit" value="Start Intermission">
	</form>

	<p>This is the current intermission:</p>
	<ul>
                <li>Intermission Start: <?php echo $startString; ?></li>
                <li>Current Time: <?php echo $nowString; ?></li>
                <li>Intermission Durration: <?php echo $durrString; ?></li>
                <li>Time Elapsed: <?php echo $elapsedString; ?></li>
                <li>Expected Return: <?php echo $leftString; ?></li>
        </ul>

</body>
</html>
