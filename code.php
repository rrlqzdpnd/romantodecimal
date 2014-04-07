<?php
	function todecimal($roman)	{
		$roman = strtoupper($roman);

		$out = 0;
		$highest = 'I';
		$perlevel = array(
			'I' => 1,
			'V' => 5,
			'X' => 10,
			'L' => 50,
			'C' => 100,
			'D' => 500,
			'M' => 1000
		);
		for($i=(strlen(trim($roman))-1); $i>=0; $i--)	{
			if($perlevel[$roman[$i]] > $perlevel[$highest])
				$highest = $roman[$i];

			$isnegative = false;
			if($perlevel[$roman[$i]] < $perlevel[$highest])
				$isnegative = true;

			$out += (($isnegative) ? -1 : 1)*$perlevel[$roman[$i]];
		}
		return $out;
	}

	echo 'Enter your roman numeral: ';
	$input = fopen('php://stdin', 'r');
	$line = fgets($input);
	echo todecimal($line)."\n";
?>
