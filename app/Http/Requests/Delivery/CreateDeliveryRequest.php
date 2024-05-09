<?php

namespace app\Http\Requests\Delivery;

use App\DataClasses\DeliveryServiceDataClass;
use App\Http\Requests\Delivery\DTO\DeliveryDTO;
use App\Http\Requests\Modelable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateDeliveryRequest extends FormRequest implements Modelable
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'receiver_name' => ['required', 'string', 'max:255'],
            'receiver_address' => ['required', 'string', 'max:255'],
            'receiver_phone' => ['required', 'string', 'max:255'],
            'weight' => ['required', 'integer'],
            'height' => ['required', 'integer'],
            'width' => ['required', 'integer'],
            'length' => ['required', 'integer'],
            'delivery_service' => ['required', 'string', Rule::in(DeliveryServiceDataClass::get_items()->keys())],
        ];
    }

    public function toDTO(): DeliveryDTO
    {
        return new DeliveryDTO(
            $this->get('name'),
            $this->get('address'),
            $this->get('phone'),
            $this->get('receiver_name'),
            $this->get('receiver_address'),
            $this->get('receiver_phone'),
            $this->get('weight'),
            $this->get('height'),
            $this->get('width'),
            $this->get('length'),
            $this->get('delivery_service')
        );
    }
}
