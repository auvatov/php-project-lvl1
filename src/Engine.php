<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function acquaintance()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function compare($question, $answer)
{
    line("Question: %s", $question);
    $userAnswer = prompt("Your answer");
    if ($userAnswer === $answer) {
        line('Correct!');
        return true;
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
        return false;
    }
}
