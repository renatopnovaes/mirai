<?php

namespace Domain\Factory;

abstract class AbstractFactory
{
    abstract static function getRepository();
    abstract static function getEntity(array|null $data);
}