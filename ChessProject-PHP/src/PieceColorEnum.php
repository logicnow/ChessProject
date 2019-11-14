<?php
declare(strict_types=1);

namespace SolarWinds\Chess;

class PieceColorEnum
{
    private const WHITE_COLOUR = 'white';
    private const BLACK_COLOUR = 'black';
    private const WHITE_COLOUR_ID = 1;
    private const BLACK_COLOUR_ID = 2;

    private static $_instance = false;
    private static $_white;
    private static $_black;
    private $_id;

    private function __construct($_id)
    {
        $this->_id = $_id;
    }

    public static function WHITE(): PieceColorEnum
    {
        self::initialise();

        return self::$_white;
    }

    public static function BLACK(): PieceColorEnum
    {
        self::initialise();

        return self::$_black;
    }

    private static function initialise(): void
    {
        if (self::$_instance) {
            return;
        }

        self::$_white = new PieceColorEnum(self::WHITE_COLOUR_ID);
        self::$_black = new PieceColorEnum(self::BLACK_COLOUR_ID);
    }

    public function __toString()
    {
        switch($this->_id) {
            case self::WHITE_COLOUR_ID:
                return self::WHITE_COLOUR;
            case self::BLACK_COLOUR_ID:
                return self::BLACK_COLOUR;
        }
    }
}
