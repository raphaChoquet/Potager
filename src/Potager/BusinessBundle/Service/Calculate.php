<?php

namespace Potager\BusinessBundle\Service;

class Calculate 
{
	public function toPercent($values)
	{	
		$total = array_sum($values);
		$lenght = count($values);

		foreach ($values as $key => $val) {
			if($total === 0) {
				$values[$key] =  round((1 / $lenght) * 100);
				continue;
			}

			$values[$key] = round($val * 100 / $total);
		}

		return $values;
	}
}