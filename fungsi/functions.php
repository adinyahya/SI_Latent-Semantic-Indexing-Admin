<?php

function SendToken($name)
{
	
	$detail =array('abc'=>'755', 'xyz'=>'917');
	foreach ($detail as $n => $p) 
	{
		if($name==$n)
		$price=$p;
	}
	return $price;
}


?>