<?php

function time_elapsed_A($secs){
	if ($secs > 0) {
		$sign="+";
	} elseif ($secs < 0) {
		$sign="-";
	} else {
		$sign="0";
	}

//	echo "sign: ".$sign;

	if ($sign=="-") {
		$secs = $secs*-1;
		$pre= "-(";
		$post=")";
//		echo $sign;
	} elseif ($sign=="+") {
		$pre = "";
		$post = "";
//		echo $sign;
	} elseif ($sign=="0") {
		$pre = "0";
		$post = "s";
//		echo $sign;
	} else {
		$pre = "oops";
		$post = "something went wrong";
//		echo $sign;
	}



    $bit = array(
        'y' => $secs / 31556926 % 12,
        'w' => $secs / 604800 % 52,
        'd' => $secs / 86400 % 7,
        'h' => $secs / 3600 % 24,
        'm' => $secs / 60 % 60,
        's' => $secs % 60
        );
        
    foreach($bit as $k => $v) {
        if($v > 0)$ret[] = $v . $k;
	}

//	echo "pre: ".$pre;
//	echo "post: ".$post;

//	print_r($ret);

	$result = $pre;
	if (isset($ret) && is_array($ret)) { $result .= join(' ', $ret); }
	$result .= $post;

    return $result;
    }
    

function time_elapsed_B($secs){
    $bit = array(
        ' year'        => $secs / 31556926 % 12,
        ' week'        => $secs / 604800 % 52,
        ' day'        => $secs / 86400 % 7,
        ' hour'        => $secs / 3600 % 24,
        ' minute'    => $secs / 60 % 60,
        ' second'    => $secs % 60
        );
        
    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . 's';
        if($v == 1)$ret[] = $v . $k;
        }
    array_splice($ret, count($ret)-1, 0, 'and');
    $ret[] = '.';
    
    return join(' ', $ret);
    }
    

    
    

/** Output:
time_elapsed_A: 6d 15h 48m 19s
time_elapsed_B: 6 days 15 hours 48 minutes and 19 seconds ago.
**/
?>
