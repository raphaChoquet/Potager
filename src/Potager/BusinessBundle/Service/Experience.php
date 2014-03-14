<?php

namespace Potager\BusinessBundle\Service;

class Experience
{

    public function fightResult($fight)
    {
        $attacker = $fight->getAttacker();
        $defender = $fight->getDefender();

        $diffLevel = $this->calcDiffLevel($attacker->getAttribute()->getLevel(),$defender->getAttribute()->getLevel());
        $xpToAdd = $this->getXpToAdd($diffLevel, $fight->getAttackerWin());
        $attacker->getAttribute()->setXp($this->addXp($attacker->getAttribute()->getXp(), $xpToAdd));

        $resultDef = $fight->getAttackerWin() * -1;

        // calculer la différence de level du defender
        // calculer son expérience
        // $defender->getAttribute()->setXp($this->addXp($xp, $xpToAdd));


        $diffLevel = $this->calcDiffLevel($defender->getAttribute()->getLevel(),$attacker->getAttribute()->getLevel());
        $xpToAdd = $this->getXpToAdd($diffLevel, $resultDef);
        $defender->getAttribute()->setXp($this->addXp($defender->getAttribute()->getXp(), $xpToAdd));
    }

    public function addXp($xp, $xpToAdd) 
    {
        $newXp = $xp + $xpToAdd;
        if ($newXp > 100) {
            return 100;
        } else {
            return $newXp;
        }
    }

    public function calcDiffLevel($level1, $level2) 
    {
        return $level1-$level2;
    }

    public function getXpToAdd($diffLevel, $result)
    {
        if ($diffLevel <= -2 AND $result === 1) {
            return 30;
        } else if (($diffLevel == -1 AND $result == 1) 
                    OR ($diffLevel <= -2 AND $result == 0)){
            return 20;
        } else if (($diffLevel == 0 AND $result == 1) 
                    OR ($diffLevel == -1 AND $result == 0)
                    OR ($diffLevel <= -2 AND $result == -1)){
            return 15;
        } else if (($diffLevel == 0 AND $result == 0) 
                    OR ($diffLevel == -1 AND $result == -1)){
            return 10;
        } else if (($diffLevel == 1 AND $result == 1) 
                    OR ($diffLevel == 0 AND $result == -1)) {
            return 5; 
        } else if ($diffLevel <= 2 AND $result == 1) {
            return 2;
        } else {
            return 0;
        }
    }
}