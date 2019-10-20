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
        if (!preg_match('/^([0-9-+*\/ ]|(\d[.]\d))+$/', $input)) {
            throw new \ErrorException(sprintf(
                'Incorrect input data "%s". Try to use numbers and simple operators e.g. [ + - / * ]',
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