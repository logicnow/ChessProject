<?php

namespace TechnicalAssessment\Chess;

class PieceColorEnum
{
    private static bool $_instance = false;
    private static PieceColorEnum $_white;
    private static PieceColorEnum $_black;

    private int $_id;

    private function __construct($_id)
    {
        $this->_id = $_id;
    }

    /** @returns PieceColorEnum */
    public static function WHITE(): PieceColorEnum
    {
        self::initialise();

        return self::$_white;
    }

    private static function initialise()
    {
        if (self::$_instance) {
            return;
        }

        self::$_white = new PieceColorEnum(1);
        self::$_black = new PieceColorEnum(2);
    }

    /** @returns PieceColorEnum */
    public static function BLACK(): PieceColorEnum
    {
        self::initialise();

        return self::$_black;
    }
}
