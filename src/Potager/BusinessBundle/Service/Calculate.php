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

	public function timeToDie($stamina, $strenght, $agility, $luck)
	{
		$damage = $strenght * 5;
		$aps = ($agility * 20) / 100;
		$hp = $stamina * 40;
		$damageTotal = 0;
		$isKill = true;
		$nbrAttack = 0;
		$i = 0;
		while ($isKill) {
			$nbrAttack++;
			$tmpDamage = $damage;
			$damageTotal += $tmpDamage;

			if ($hp <= $damageTotal) {
				return $nbrAttack * (1 / $aps);
			}

			if($i > 200) {
				$isKill = false;
			}
			$i++;
		}
 
	}

}