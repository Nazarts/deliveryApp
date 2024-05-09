<?php

namespace App\DataClasses;

use App\DataClasses\BaseDataClass;
use App\Services\NovaPoshtaDeliveryService;
use Illuminate\Support\Collection;

class DeliveryServiceDataClass extends BaseDataClass
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
                    'handler' => NovaPoshtaDeliveryService::class
                ],
            ]
        );
    }
}
