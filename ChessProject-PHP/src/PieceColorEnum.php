<?php
declare(strict_types=1);

namespace SolarWinds\Chess;

class PieceColorEnum
{
    private static $_instance = false;
    private static $_white;
    private static $_black;

    private $_id;

    private function __construct($_id)
    {
        $this->_id = $_id;
    }

    public static function WHITE() : PieceColorEnum
    {
        self::initialise();

        return self::$_white;
    }

    public static function BLACK() : PieceColorEnum
    {
        self::initialise();

        return self::$_black;
    }

    private static function initialise()
    {
        if (self::$_instance) {
            return;
        }

        self::$_white = new PieceColorEnum(1);
        self::$_black = new PieceColorEnum(2);
    }

}
