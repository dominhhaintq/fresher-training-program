<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 28/5/2017
 * Time: 10:06 AM
 */
require_once('../Weapon/BlackCleaver.php');
require_once('../Weapon/InfinityEdge.php');
require_once('../Armor/GuardianAngel.php');
require_once('../Armor/SunfireCape.php');
require_once('../Unit/Garen.php');
require_once('../Unit/Ashe.php');

// start game
start_game(
    array('unit' => new Garen(), 'weapon' => new BlackCleaver(), 'armor' => new SunfireCape()) ,
    array('unit' => new Ashe(), 'weapon' => new InfinityEdge(), 'armor' => new GuardianAngel())
);

/*start_game
  input: array("unit" => $unit, 'weapon' => $weapon, 'armor' => $armor)
*/
function start_game(array $unit_1_info, array  $unit_2_info)
{
    $unit_1 = create_unit($unit_1_info['unit'], $unit_1_info['weapon'], $unit_1_info['armor']);
    $unit_2 = create_unit($unit_2_info['unit'], $unit_2_info['weapon'], $unit_2_info['armor']);
    $turn = 1;
    while ($unit_1->getBaseHealth() > 0 && $unit_2->getBaseHealth() > 0) {
        if ($turn % 2 != 0) {
            echo "Turn $turn : " . get_battle_turn_result($unit_1, $unit_2);
        } else {
            echo "Turn $turn : " . get_battle_turn_result($unit_2, $unit_1);
        }
        $turn++;
    }
}

// create unit
function create_unit(Unit $unit, Weapon $weapon, Armor $armor)
{
    $unit->setWeapon($weapon);
    $unit->setArmor($armor);

    return $unit;
}

// get critical, block  with percent of weapon, armor
function get_random_skill($percent)
{
    $random = rand(1, 100);
    if ($random <= $percent) {
        return true;
    }

    return false;
}

// battle turn result
function get_battle_turn_result(Unit $damageUnit, Unit $defenseUnit)
{
    $hasCriticalHit = get_random_skill($damageUnit->getCriticalHit());
    $hasBlock = get_random_skill($defenseUnit->getBlock());

    if ($hasCriticalHit) {
        $hpDecrease = 2 * ($damageUnit->getBaseDamage() - $defenseUnit->getBaseDefense());
        $hpDecrease = ($hpDecrease > 0) ? $hpDecrease : 0;
    } else {
        $hpDecrease = $damageUnit->getBaseDamage() - $defenseUnit->getBaseDefense();
        $hpDecrease = ($hpDecrease > 0) ? $hpDecrease : 0;
    }

    if ($hasCriticalHit) {
        $result = get_critical_hit_attack_result($hpDecrease, $damageUnit, $defenseUnit);
    } else {
        $result = get_non_critical_hit_attack_result($hpDecrease, $damageUnit, $defenseUnit);
    }

    if ($hasBlock) {
        $result .= ' but his attack has been blocked.<br/>';
    } else {
        $result .= '<br/>';
        $defenseUnit->setBaseHealth($defenseUnit->getBaseHealth() - $hpDecrease);
    }

    if ($defenseUnit->getBaseHealth() <= 0) {
        $result .= $defenseUnit->getUnitName() . ' has been defeated by ' . $damageUnit->getUnitName() . '<br/>';
    }

    return $result;
}

// get critical hit attack result
function get_critical_hit_attack_result($hpDecrease, Unit $damageUnit, Unit $defenseUnit)
{
    $result = $damageUnit->getUnitName()
            . ' dealt a critical hit of '
            . $hpDecrease
            . '(('
            . $damageUnit->getBaseDamage()
            . '-'
            . $defenseUnit->getBaseDefense()
            . ')*2) damage to '
            . $defenseUnit->getUnitName();
    return $result;
}

// get non critical hit attack result
function get_non_critical_hit_attack_result($hpDecrease, Unit $damageUnit, Unit $defenseUnit)
{
    $result = $damageUnit->getUnitName()
        . ' dealt '
        . $hpDecrease
        . '('
        . $damageUnit->getBaseDamage()
        . '-'
        . $defenseUnit->getBaseDefense()
        . ') damage to '
        . $defenseUnit->getUnitName();
    return $result;
}