<?php

namespace SolarWinds\Chess;

class MovementTypeEnum
{
    private static $_initialised = false;
    private static $_move;
    private static $_capture;

    private $_id;

    private function __construct($_id)
    {
        $this->_id = $_id;
    }

    /** @return: MovementTypeEnum */
    public static function MOVE()
    {
        self::initialise();

        return self::$_move;
    }

    /** @return: MovementTypeEnum */
    public static function CAPTURE()
    {
        self::initialise();

        return self::$_capture;
    }

    private static function initialise()
    {
        if (self::$_initialised) {
            return;
        }

        self::$_move = new MovementTypeEnum(1);
        self::$_capture = new MovementTypeEnum(2);

        self::$_initialised = true;
    }

}
