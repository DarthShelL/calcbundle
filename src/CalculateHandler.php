<?php


namespace darthshell\cfs;


use darthshell\cfs\CalculateInterfacee;

class CalculateHandler implements CalculateInterface
{
    function calculate(string $input): string
    {
        $this->checkInput($input);

        try {
            $result = eval("return {$input};");
        } catch (\ErrorException $exception) {
            echo $exception->getMessage();
        }

        return $this->prettyOut($result);
    }

    private function checkInput(string $input): bool
    {
        if (!is_string($input)) {
            throw new \ErrorException(sprintf(
                'Incorrect input data type! Input data must be a string.',
                $input
            ));
        }

        if (!preg_match('/^([0-9-+*\/() ]|(\d[.]\d))+$/', $input)) {
            throw new \ErrorException(sprintf(
                'Incorrect input data "%s". Try to use numbers and simple operators e.g. [ + - / * ]',
                $input
            ));
        }

        if (preg_match('/(\/\s?[0])/', $input)) {
            throw new \ErrorException(sprintf(
                'Division by Zero!! Are u kidding with me?',
                $input
            ));
        }

        if (preg_match('/([+-\/*])$/', $input)) {
            throw new \ErrorException(sprintf(
                'Is anything missing?',
                $input
            ));
        }

        if (preg_match('/^(\s?[+\/*])/', $input)) {
            throw new \ErrorException(sprintf(
                'May be you\'ll try to start with number?',
                $input
            ));
        }

        if (preg_match('/(\d\s+\d)/', $input)) {
            throw new \ErrorException(sprintf(
                'Is anything missing?',
                $input
            ));
        }

        if (preg_match('/([\/*+-]{2})/', $input)) {
            throw new \ErrorException(sprintf(
                'Too many operators',
                $input
            ));
        }

        if (preg_match('/(\(\))/', $input)) {
            throw new \ErrorException(sprintf(
                'You\'d better fill in something',
                $input
            ));
        }

        if (preg_match('/([+-\/*]\s?\))/', $input)) {
            throw new \ErrorException(sprintf(
                'What\'s wrong with you?',
                $input
            ));
        }

        if (
            preg_match('/(\()$/', $input)
            || preg_match('/^(\))/', $input)
        ) {
            throw new \ErrorException(sprintf(
                'Seems to me that you have more "(" than you need',
                $input
            ));
        }

        $m1 = $m2 = [];
        preg_match_all('/(\()/', $input, $m1);
        preg_match_all('/(\))/', $input, $m2);

        if (count($m1[0]) !== count($m2[0])) {
            throw new \ErrorException(sprintf(
                'Oh boi, you have to get equal count of "(" and ")"',
                $input
            ));
        }

        return true;
    }

    private function prettyOut($value): string
    {
        return sprintf('%s', $value);
    }
}