<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\acquaintance;
use function BrainGames\Engine\compare;

use const BrainGames\Engine\ROUNDS;

function getQuestionAndAnswer(): array
{
    $progArray = [];
    $element = mt_rand(-100, 100); //first element
    $stepProgr = mt_rand(-10, 10);
    $progArray[] = $element;

    for ($count = 1; $count < 10; $count++) {
        $element += $stepProgr;
        $progArray[] = $element;
    }

    $hideElementIndex = array_rand($progArray, 1);
    $answer = $progArray[$hideElementIndex];
    $progArray[$hideElementIndex] = "..";
    $question = implode(" ", $progArray);

    return [$question, $answer];
}

function brainProg()
{
    $name = acquaintance();
    line("What number is missing in the progression?");
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
