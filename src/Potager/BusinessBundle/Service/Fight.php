<?php

namespace Potager\BusinessBundle\Service;

class Fight
{

    public function attack($attacker, $defender)
    {
        $hpDefender = $this->calcHp($defender->getStamina());
        $damage = $this->calcDamage($attacker->getStrenght());
        $luck = $this->calcLuck($attacker->getLuck());
        $aps = $this->calcAps($attacker->getAgility());

        return $this->timeToDie($this->nbrAttackToDie($hpDefender, $damage, $luck), $aps);
    }


    public function nbrAttackToDie($hpOpponent, $damage, $luck)
    {
        $nbrAttack = 0;
        $damagesTotal = 0;
        $i = 0;

        while ($i <= 1000)
        {
            $nbrAttack++;
            $damagesTotal += $this->critic($damage, $luck);
            if ($hpOpponent <= $damagesTotal) {
                return $nbrAttack;
            }
            $i++;
        }

    }

    public function timeToDie($nbrAttack, $aps)
    {
        return $nbrAttack * (1/$aps);
    }

    public function critic($damage, $luck)
    {
        return (round(rand(0, 100)) <= ($luck)) ? $damage * 2 : $damage;
    }

    public function calcHp($stamina)
    {
        return $stamina * 40;
    }

    public function calcLuck($luck)
    {
        return 1 + (($luck-1)*2);
    }

    public function calcDamage($strenght)
    {
        return $strenght * 5;
    }

    public function calcAps($agility)
    {
        return ($agility * 20) / 100;
    }

}