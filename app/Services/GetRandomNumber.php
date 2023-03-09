<?php
namespace App\Services;

class GetRandomNumber{

    public function getNumber(){
        return rand(0, 100);
    }

}