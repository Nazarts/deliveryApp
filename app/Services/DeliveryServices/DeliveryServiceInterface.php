<?php

namespace App\Services\DeliveryServices;

use app\Http\Requests\Delivery\DTO\DeliveryDTO;
use Illuminate\Http\JsonResponse;

interface DeliveryServiceInterface
{
    public function createDelivery(DeliveryDTO $deliveryDTO): JsonResponse;
}
