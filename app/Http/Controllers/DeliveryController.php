<?php

namespace App\Http\Controllers;

use App\DataClasses\DeliveryServiceDataClass;
use App\Http\Requests\Delivery\CreateDeliveryRequest;

class DeliveryController extends Controller
{
    public function __invoke(CreateDeliveryRequest $request)
    {
        $deliveryDTO = $request->toDTO();
        $deliveryServiceClass = DeliveryServiceDataClass::get_item($deliveryDTO->delivery_service)['handler']??null;
        if(!$deliveryServiceClass) {
            return response()->json([
                'message' => 'Delivery service not found'
            ], 422);
        }
        return (new $deliveryServiceClass)->createDelivery($deliveryDTO);
    }
}
