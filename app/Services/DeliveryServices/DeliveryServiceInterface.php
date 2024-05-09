<?php

namespace App\Services;

use app\Http\Requests\Delivery\DTO\DeliveryDTO;

interface DeliveryServiceInterface
{
    public function createDelivery(DeliveryDTO $deliveryDTO): bool;
}
