<?php 
/*********
 * Intermission Start
 *
 * This sets the variable for the start of the intermission
 *
 ********/

$filename="intermissionstart.date";

function intermissionStartTime($filename) {
	if (file_exists($filename) && is_readable($filename)) {
		$file=fopen($filename, "r");
		$startTime=fgets($file);
		if (date("D Y F j, H:i:s", $startTime)) {
			return $startTime;
		} else {
			return FALSE;
		}
	} else {
		return FALSE;
	}
}

function startIntermission($startname, $durrationname, $reasonname, $durration, $reason) {
	if (file_exists($startname) && is_writable($startname)) {
                $file=fopen($startname, "w");
		$startTime=time();
                fwrite($file, $startTime);
		fclose($file);
	}
	if (file_exists($durrationname) && is_writable($durrationname)) {
                $file=fopen($durrationname, "w");
                fwrite($file, $durration);
		fclose($file);
	}
	if (file_exists($reasonname) && is_writable($reasonname)) {
                $file=fopen($reasonname, "w");
                fwrite($file, $reason);
                fclose($file);
	}
	
}       

function intermissionDurration($filename) {
	if (file_exists($filename) && is_readable($filename)) {
		$file=fopen($filename, "r");
		$startTime=fgets($file);
		if (date("D Y F j, H:i:s", $startTime)) {
			return $startTime;
		} else {
			return FALSE;
		}
	} else {
		return FALSE;
	}
}

function interrmissionReason($reasonname) {
	if (file_exists($reasonname) && is_readable($reasonname) {
		$file=fopen($reasonname, "r");
		$reason=$fgets($file);
		return $reason;
	} else {
		return FALSE;
	}
}

