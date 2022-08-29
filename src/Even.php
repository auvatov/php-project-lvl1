<?php

namespace BrainGames\Even;

// require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function brainEven()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $roundCount = 3;
    while ($roundCount > 0) {
        $num = mt_rand(0, 100);
        line("Question: %s", $num);
        $answer = prompt("Your answer");
        $parity = ($num % 2 === 0) ? "yes" : "no";
        if ($answer === $parity) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$parity}'.");
            line("Let's try again, %s!", $name);
            return;
        }
        $roundCount--;
    }
    line("Congratulations, %s!", $name);
}
