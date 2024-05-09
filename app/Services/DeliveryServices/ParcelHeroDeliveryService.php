<?php

namespace App\Services\DeliveryServices;

use app\Http\Requests\Delivery\DTO\DeliveryDTO;
use Illuminate\Http\JsonResponse;

class ParcelHeroDeliveryService implements DeliveryServiceInterface
{
    public function createDelivery(DeliveryDTO $deliveryDTO): JsonResponse
    {
        return response()->json(['message' => 'Delivery created']);
    }
}
