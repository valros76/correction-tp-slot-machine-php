<?php

namespace Controllers;

class SlotController
{

  public static function getRandomSymbol(array $symbols_with_weights)
  {
    $rand = mt_rand(1, array_sum($symbols_with_weights)); // Générer un nombrealéatoire
    foreach ($symbols_with_weights as $symbol => $weight) {
      if ($rand <= $weight) {
        return $symbol;
      }
      $rand -= $weight; // Réduire le seuil
    }
    return null; // Cas improbable

  }

  public static function play()
  {
    // Résultheader('Content-Type: application/json');
    // Symboles et leurs poids (proba d'apparition)
    // Chaque symbole a une probabilité spécifique d’apparaître. Les symbolesavec des gains élevés sont rendus plus rares.
    $symbols_with_weights = [
      '🍋' => 40,
      '🍒' => 30,
      '⭐' => 15,
      '🔔' => 10,
      '💎' => 5,
    ];
    // Table des gains (combinaison => gain)
    $paytable = [
      '🍋🍋🍋' => 40,
      '🍒🍒🍒' => 50,
      '⭐⭐⭐' => 100,
      '🔔🔔🔔' => 150,
      '💎💎💎' => 200,
    ];
    // Générer 3 symboles
    $reel1 = self::getRandomSymbol($symbols_with_weights);
    $reel2 = self::getRandomSymbol($symbols_with_weights);
    $reel3 = self::getRandomSymbol($symbols_with_weights); // Résultat de lamachine à sous
    $combination = $reel1 . $reel2 . $reel3;
    // Calculer le gain
    $gain = isset($paytable[$combination]) ? $paytable[$combination] : 0;
    // Réponse JSON
    echo json_encode([
      'success' => true,
      'reels' => [$reel1, $reel2, $reel3],
      'gain' => $gain,
    ]);
  }
}
