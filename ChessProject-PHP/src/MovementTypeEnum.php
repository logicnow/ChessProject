<?php
declare(strict_types=1);

namespace SolarWinds\Chess;

class MovementTypeEnum
{
    private static $_instance = false;
    private static $_move;
    private static $_capture;

    private $_id;

    private function __construct($_id)
    {
        $this->_id = $_id;
    }

    public static function MOVE() : MovementTypeEnum
    {
        self::initialise();

        return self::$_move;
    }

    public static function CAPTURE() : MovementTypeEnum
    {
        self::initialise();

        return self::$_capture;
    }

    private static function initialise()
    {
        if (self::$_instance) {
            return;
        }

        self::$_move = new MovementTypeEnum(1);
        self::$_capture = new MovementTypeEnum(2);
    }

}
