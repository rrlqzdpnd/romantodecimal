<?php
	function convertroman($decimal)	{
		if($decimal > 3999)
			return "Too large lol";

		$level = 0;
		$perlevel = array(
			array('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'),
			array('X', 'XX', 'XXX', 'XL', 'L', 'LX', 'LXX', 'LXXX', 'XC'),
			array('C', 'CC', 'CCC', 'CD', 'D', 'DC', 'DCC', 'DCCC', 'CM'),
			array('M', 'MM', 'MMM')
		);
		$return = "";

		while($decimal > 0)	{
			$ones = $decimal % 10;
			$decimal = (int)($decimal/10);
			$return = $perlevel[$level][$ones-1].$return;
			$level++;
		}

		return $return;
	}

	echo "Enter your decimal: ";
	$input = fgets(STDIN);
	echo convertroman((int)$input)."\n";
?>
