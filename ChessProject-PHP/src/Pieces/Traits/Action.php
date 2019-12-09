<?php

namespace SolarWinds\Chess\Pieces\Traits;

class Action
{
    private static bool $instance = false;
    private static Action $move;
    private static Action $capture;
    private int $id;

    private function __construct($id)
    {
        $this->id = $id;
    }

    public static function MOVE(): Action
    {
        self::initialise();

        return self::$move;
    }

    public static function CAPTURE(): Action
    {
        self::initialise();

        return self::$capture;
    }

    private static function initialise()
    {
        if (self::$instance) {
            return;
        }

        self::$move = new Action(1);
        self::$capture = new Action(2);
    }
}
