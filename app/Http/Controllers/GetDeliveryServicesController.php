<?php

namespace App\Http\Controllers;

use App\DataClasses\DeliveryServiceDataClass;

class GetDeliveryServicesController extends Controller
{
    public function __invoke()
    {
        return DeliveryServiceDataClass::get_items()->keys()->toArray();
    }
}
