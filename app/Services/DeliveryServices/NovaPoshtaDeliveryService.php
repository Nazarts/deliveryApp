<?php

namespace App\Services;

use app\Http\Requests\Delivery\DTO\DeliveryDTO;

class NovaPoshtaDeliveryService implements DeliveryServiceInterface
{
    public function createDelivery(DeliveryDTO $deliveryDTO): bool
    {
        return true;
    }
}
