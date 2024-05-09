<?php

namespace App\Http\Requests;

interface Modelable
{
    public function toDTO(): mixed;
}
