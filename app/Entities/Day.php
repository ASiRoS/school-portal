<?php

namespace App\Entities;

use InvalidArgumentException;

class Day
{
    private $title, $value;

    private static $translations, $days = [];

    private function __construct(int $value)
    {
        if(!self::$translations) {
            self::$translations = trans('messages.days');
        }

        if(!isset(self::$translations[$value])) {
            throw new InvalidArgumentException('Such day doesn\'t exist');
        }

        $this->title = self::$translations[$value];
        $this->value = $value;
    }

    public static function getDays(): array
    {
        self::initialize();

        return self::$days;
    }

    public static function getDay(int $day): self
    {
        self::initialize();

        $day -= 1;

        if(!isset(self::$translations[$day])) {
            throw new InvalidArgumentException('Such day doesn\'t exist');
        }

        return self::$days[$day];
    }

    private static function initialize(): void
    {
        if(self::$days) {
            return;
        }

        $days = [1, 2, 3, 4, 5, 6, 7];

        foreach($days as $day) {
            self::$days[] = new self($day);
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getValue()
    {
        return $this->value;
    }
}