<?php

namespace BrainGames\Games\BCD;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\acquaintance;
use function BrainGames\Engine\compare;

use const BrainGames\Engine\ROUNDS;

function getQuestionAndAnswer(): array
{
    $num1 = mt_rand(0, 100);
    $num2 = mt_rand(0, 100);
    $question = "{$num1} {$num2}";
    $answer = null;
    if ($num1 < $num2) {
        $lesser = $num1;
        $greater = $num2;
    } elseif ($num2 < $num1) {
        $lesser = $num2;
        $greater = $num1;
    } else {
        $answer = $num1;
    }
    for ($i = 1; !$answer and $i <= $lesser / 2; $i++) {
        $divider = $lesser / $i;
        if ($divider == round($divider) and $greater % $divider === 0) {
            $answer = $divider;
        }
    }
    if ($answer === null) {
        $answer = 1;
    }
    return [$question, (string) $answer];
}

function brainBcd()
{
    $name = acquaintance();
    line("Find the greatest common divisor of given numbers.");
    $roundCount = ROUNDS;
    while ($roundCount > 0) {
        [$question, $answer] = getQuestionAndAnswer();
        if (!compare($question, $answer)) {
            line("Let's try again, %s!", $name);
            return;
        }
        $roundCount--;
    }
    line("Congratulations, %s!", $name);
}
