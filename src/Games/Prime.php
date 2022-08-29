<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\acquaintance;
use function BrainGames\Engine\compare;

use const BrainGames\Engine\ROUNDS;

function getQuestionAndAnswer(): array
{
    $question = mt_rand(0, 100);
    $answer = isPrime($question);
    return [$question, $answer];
}

function isPrime(int $num)
{
    if ($num <= 1) {
        return "no";
    }
    for ($div = 2, $maxDiv = $num / 2; $div <= $maxDiv; $div++) {
        if ($num % $div === 0) {
            return "no";
        }
    }
    return "yes";
}

function brainPrime()
{
    $name = acquaintance();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $roundCount = ROUNDS;
    while ($roundCount > 0) {
        [$question, $answer] = getQuestionAndAnswer();
        if (!compare($question, $answer)) {
            line("Let's try again, %s!", $name);
            return;
        }
        $roundCount--;
    }
    line("Congratilations, %s!", $name);
}
