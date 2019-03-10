<?php
namespace MicroForce\Engine;

use Symfony\Component\Templating\EngineInterface;

class EngineSingleton
{
    static private $engine;
    
    //##############################//
    //########## GETTER ############//
    //##############################//
    static public function getEngine() : EngineInterface
    {
        if (!self::$engine) {
            throw new \LogicException('Trying to load unconfigured engine instance');
        }
        return self::$engine;
    }
   
    //##############################//
    //########## SETTER ############//
    //##############################//
    static public function setEngine(EngineInterface $engine) : void
    {
        self::$engine = $engine;
    }
}

// La LOGIQUE DU GET & SET : qui pass en premier ????????????????????????????????????????????????????????????