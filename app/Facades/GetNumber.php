<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class GetNumber extends Facade{

    protected static function getFacadeAccessor(){
        return 'getNumber';
    }
}