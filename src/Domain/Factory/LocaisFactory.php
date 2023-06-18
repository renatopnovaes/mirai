<?php

namespace Domain\Factory;

use Domain\Repository\LocaisRepository;

abstract class LocaisFactory
{
    private static function getRepository()
    {
       return new LocaisRepository();
    }
    
    public static function getListLocais(): array|string    
    {
        return self::getRepository()->getAllLocais();
    }
}