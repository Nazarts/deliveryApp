<?php

namespace App\DataClasses;

use Illuminate\Support\Collection;

class DeliveryServiceDataClass implements BaseDataClass
{
    const NOVA_POSHTA = 'nova_poshta';
    const CDEK = 'cdek';
    const UKR_POSHTA = 'ukr_poshta';
    const MEEST = 'meest';
    const PARCEL_HERO = 'parcel_hero';
    const AMAZON = 'amazon';
    const FEDEX = 'fedex';

    static public function get_items(): Collection
    {
        return collect(
            [
                self::NOVA_POSHTA => [
                    'name' => 'Нова Пошта',
                ],
                self::CDEK => [
                    'name' => 'CDEK',
                ],
                self::UKR_POSHTA => [
                    'name' => 'УкрПошта',
                ],
                self::MEEST => [
                    'name' => 'Meest',
                ],
                self::PARCEL_HERO => [
                    'name' => 'ParcelHero',
                ],
                self::AMAZON => [
                    'name' => 'Amazon',
                ],
                self::FEDEX => [
                    'name' => 'Fedex',
                ],
            ]
        );
    }

    static public function get_item(string $key): mixed {
        return self::get_items()->filter(function ($value, $id) use ($key) {
            return $id === $key;
        })->first();
    }
}
