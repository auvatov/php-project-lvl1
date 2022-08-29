<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\acquaintance;
use function BrainGames\Engine\compare;

use const BrainGames\Engine\ROUNDS;

function getQuestionAndAnswer(): array
{
    $num1 = mt_rand(0, 10);
    $num2 = mt_rand(0, 10);
    $operators = ["+", "-", "*"];
    $question = "";
    $answer = null;
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
    return [$question, $answer];
}

function brainCalc()
{
    $name = acquaintance();
    line("What is the result of the expression?");
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
