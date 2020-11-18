<?php


namespace App\Http\Controllers;


use App\Events\NumberThreeDropped;

class TestEventsController extends Controller
{
    public function __invoke()
    {
        $number = mt_rand(1, 3);

        NumberThreeDropped::dispatch($number);

        echo 'end.';
    }
}
