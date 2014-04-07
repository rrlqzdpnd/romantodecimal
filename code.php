<?php
	/**
	 *	Compresses a string into a character-count list for pre-processing
	 */
	function compr($string)	{
		$list = array();
		$last = "";
		for($i=0; $i<strlen(trim($string)); $i++)	{
			if($string[$i] != $last)	{
				$last = $string[$i];
				$list[] = array($string[$i], 1);
			}
			else	{
				$list[count($list)-1][1] += 1;
			}
		}
		return $list;
	}

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
		$characters = array_keys($perlevel);
		$compr = compr($roman);
		for($i=0; $i<count($compr)-1; $i++)	{
			if($perlevel[$compr[$i][0]] < $perlevel[$compr[$i+1][0]] && $compr[$i][1] > 1)
				return "Invalid Roman Numeral";
		}

		for($i=(strlen(trim($roman))-1); $i>=0; $i--)	{
			if(!in_array($roman[$i], $characters))	{
				return 'Invalid Roman Numeral';
			}

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
