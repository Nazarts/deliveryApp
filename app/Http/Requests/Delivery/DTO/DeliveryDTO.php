<?php

namespace app\Http\Requests\Delivery\DTO;

class DeliveryDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $address,
        public readonly string $phone,
        public readonly string $receiver_name,
        public readonly string $receiver_address,
        public readonly string $receiver_phone,
        public readonly int $weight,
        public readonly int $height,
        public readonly int $width,
        public readonly int $length,
        public readonly string $delivery_service
    ) {}
}
