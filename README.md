# Calc from string bundle

This magic bundle for [symfony4](https://symfony.com/) let you calculate basic math expressions from string 

Installation
---------------
add this repository to your project composer.json:

    "repositories": [
        ...
        {
            "type": "vcs",
            "url": "https://github.com/DarthShelL/calcbundle.git"
        }
    ]

use composer to get your own cfs right in project:

    composer require darthshell/cfs

and also don't forget to add cfs to your bundles in */config/bundles.php*:

    return [
        ...
        darthshell\cfs\CalculateFromStringBundle::class => ['all' => true],
    ];

Usage
---------------
simple use:

    use darthshell\cfs\CalculateFromString;
    ...
    $cfs = new CalculateFromString();
    $input = '2+2*2';
    $result = $cfs->calculate($input); 
    ...

or use it in controller
    
    use darthshell\cfs\CalculateFromString;
    ...
    function show($input, CalculateFromString $cfs) {
        return new Response($cfs->calculate($input));
    } 
    ...

or go DIPer and make your own calculating class implementing *darthshell\cfs\CalculateInterface* 
    
    use darthshell\cfs\CalculateInterface
    
    class MyCalculate implements CalculateInterface
    {
        function calculate(string $input): string
        {
            ...        
            return $this->mySuperCalculate($input);
        }
        ...
    }

but don't forget to override service argument in your *config/packages* directory
for example with yaml *cfs.yaml*:

    services:
      darthshell\cfs\CalculateFromString:
        arguments:
          $ci: '@App\MyCalculate'
          
