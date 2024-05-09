<?php

namespace App\DataClasses;

use Illuminate\Support\Collection;

interface BaseDataClass
{
    static public function get_items(): Collection;
}
