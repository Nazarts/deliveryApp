<?php

namespace App\Services;

use app\Http\Requests\Delivery\DTO\DeliveryDTO;
use App\Services\DeliveryServices\DeliveryServiceInterface;
use Illuminate\Http\JsonResponse;

class DeliveryHandlerService
{
    private DeliveryServiceInterface $deliveryService;
    public function setDelivery(DeliveryServiceInterface $deliveryService): void
    {
        $this->deliveryService = $deliveryService;
    }

    public function executeDelivery(DeliveryDTO $deliveryDTO): JsonResponse
    {
        if(!$this->deliveryService) {
            throw new \BadMethodCallException('First set up delivery service');
        }
        return $this->deliveryService->createDelivery($deliveryDTO);
    }
}
