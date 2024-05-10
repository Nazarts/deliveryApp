<?php

namespace App\Http\Controllers;

use App\DataClasses\DeliveryServiceDataClass;
use App\Http\Requests\Delivery\CreateDeliveryRequest;
use App\Services\DeliveryHandlerService;
use App\Services\DeliveryServices\AmazonDeliveryService;
use App\Services\DeliveryServices\CdekDeliveryService;
use App\Services\DeliveryServices\FedexDeliveryService;
use App\Services\DeliveryServices\MeestDeliveryService;
use App\Services\DeliveryServices\ParcelHeroDeliveryService;
use App\Services\DeliveryServices\UkrPoshtaDeliveryService;

class DeliveryController extends Controller
{
    public function __invoke(CreateDeliveryRequest $request)
    {
        $deliveryDTO = $request->toDTO();
        $deliveryService = match ($deliveryDTO->delivery_service) {
            DeliveryServiceDataClass::CDEK => new CdekDeliveryService(),
            DeliveryServiceDataClass::UKR_POSHTA => new UkrPoshtaDeliveryService(),
            DeliveryServiceDataClass::MEEST => new MeestDeliveryService(),
            DeliveryServiceDataClass::PARCEL_HERO => new ParcelHeroDeliveryService(),
            DeliveryServiceDataClass::AMAZON => new AmazonDeliveryService(),
            DeliveryServiceDataClass::FEDEX => new FedexDeliveryService(),
            default => null
        };
        if(!$deliveryService) {
            return response()->json([
                'message' => 'Delivery service not found'
            ], 422);
        }
        $deliveryHandler = new DeliveryHandlerService();
        $deliveryHandler->setDelivery($deliveryService);

        return $deliveryHandler->executeDelivery($deliveryDTO);
    }
}
