<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalcController
{
    /**
     * @Route("/calc/{phrase}")
     */
    public function calcIt($phrase) {
        return new Response(
            '<html><body>Your phrase was: '.$phrase.'</body></html>'
        );
    }
}