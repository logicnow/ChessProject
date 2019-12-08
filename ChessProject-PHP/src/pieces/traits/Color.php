<?php

namespace SolarWinds\Chess\Pieces\Traits;

class Color
{
    private static bool $instance = false;
    private static Color $white;
    private static Color $black;
    private int $id;

    private function __construct($id)
    {
        $this->id = $id;
    }

    public static function WHITE()
    {
        self::initialise();

        return self::$white;
    }

    public static function BLACK()
    {
        self::initialise();

        return self::$black;
    }

    private static function initialise()
    {
        if (self::$instance) {
            return;
        }

        self::$white = new Color(1);
        self::$black = new Color(2);
    }
}
