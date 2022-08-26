<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\acquaintance;
use function BrainGames\Engine\compare;

$name = acquaintance();
line("What is the result of the expression?");
$roundCount = 3;
$operators = ["+", "-", "*"];
$answer = null;
$question = "";
$noMistake = true;
while ($roundCount > 0) {
    $num1 = mt_rand(0, 10);
    $num2 = mt_rand(0, 10);
    $operator = $operators[array_rand($operators, 1)]; //receipt random operation from array
    switch ($operator) {
        case "+":
            $answer = $num1 + $num2;
            $question = "{$num1} + {$num2}";
            break;
        case "-":
            $answer = $num1 - $num2;
            $question = "{$num1} - {$num2}";
            break;
        case "*":
            $answer = $num1 * $num2;
            $question = "{$num1} * {$num2}";
    }
    if (!compare($question, $answer)) {
        line("Let's try again, %s!", $name);
        $noMistake = false;
        return;
    }
    $roundCount--;
}
if ($noMistake) {
    line("Congratilations, %s!", $name);
}
