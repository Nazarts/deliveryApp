<?php

namespace App\Http\Controllers;

use App\DataClasses\DeliveryServiceDataClass;
use app\Http\Requests\Delivery\CreateDeliveryRequest;

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
        $result = (new $deliveryServiceClass)->createDelivery($deliveryDTO);
        if (!$result) {
            return response()->json([
                'message' => 'Something went wrong, please try again or contact admins'
            ], 500);
        }
        return response()->json([
            'message' => 'Delivery created'
        ], 200);
    }
}
