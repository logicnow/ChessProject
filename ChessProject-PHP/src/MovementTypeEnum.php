<?php

namespace TechnicalAssessment\Chess;

class MovementTypeEnum
{
    private static bool $_instance = false;
    private static MovementTypeEnum $_move;
    private static MovementTypeEnum $_capture;

    private int $_id;

    private function __construct($_id)
    {
        $this->_id = $_id;
    }

    /** @returns MovementTypeEnum */
    public static function MOVE(): MovementTypeEnum
    {
        self::initialise();

        return self::$_move;
    }

    private static function initialise()
    {
        if (self::$_instance) {
            return;
        }

        self::$_move = new MovementTypeEnum(1);
        self::$_capture = new MovementTypeEnum(2);
    }

    /** @returns MovementTypeEnum */
    public static function CAPTURE(): MovementTypeEnum
    {
        self::initialise();

        return self::$_capture;
    }
}
