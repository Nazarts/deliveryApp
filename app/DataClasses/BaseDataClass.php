<?php

namespace App\DataClasses;

use Illuminate\Support\Collection;

abstract class BaseDataClass
{
    static public abstract function get_items(): Collection;
    static public function get_item(string $key): mixed {
        return $this->get_items()->filter(function ($value, $id) use ($key) {
            return $id === $key;
        })->first();
    }
}
