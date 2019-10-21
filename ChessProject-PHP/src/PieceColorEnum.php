<?php

namespace SolarWinds\Chess;

class PieceColorEnum
{
    private static $_initialised = false;
    private static $_white;
    private static $_black;

    private $_id;

    private function __construct($_id)
    {
        $this->_id = $_id;
    }

    /** @return: PieceColorEnum */
    public static function WHITE(): PieceColorEnum
    {
        self::initialise();

        return self::$_white;
    }

    /** @return: PieceColorEnum */
    public static function BLACK(): PieceColorEnum
    {
        self::initialise();

        return self::$_black;
    }

    public function innerValue()
    {
        return $this->_id;
    }

    private static function initialise()
    {
        if (self::$_initialised) {
            return;
        }

        self::$_white = new PieceColorEnum(1);
        self::$_black = new PieceColorEnum(2);

        self::$_initialised = true;
    }

}
