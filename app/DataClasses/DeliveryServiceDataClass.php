<?php

namespace App\DataClasses;

use App\Services\DeliveryServices\AmazonDeliveryService;
use App\Services\DeliveryServices\CdekDeliveryService;
use App\Services\DeliveryServices\FedexDeliveryService;
use App\Services\DeliveryServices\MeestDeliveryService;
use App\Services\DeliveryServices\NovaPoshtaDeliveryService;
use App\Services\DeliveryServices\ParcelHeroDeliveryService;
use App\Services\DeliveryServices\UkrPoshtaDeliveryService;
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
                    'handler' => NovaPoshtaDeliveryService::class
                ],
                self::CDEK => [
                    'name' => 'CDEK',
                    'handler' => CdekDeliveryService::class
                ],
                self::UKR_POSHTA => [
                    'name' => 'УкрПошта',
                    'handler' => UkrPoshtaDeliveryService::class
                ],
                self::MEEST => [
                    'name' => 'Meest',
                    'handler' => MeestDeliveryService::class
                ],
                self::PARCEL_HERO => [
                    'name' => 'ParcelHero',
                    'handler' => ParcelHeroDeliveryService::class
                ],
                self::AMAZON => [
                    'name' => 'Amazon',
                    'handler' => AmazonDeliveryService::class
                ],
                self::FEDEX => [
                    'name' => 'Fedex',
                    'handler' => FedexDeliveryService::class
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
