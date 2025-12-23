<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryInfoRequest extends FormRequest
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
    // Get the delivery info ID from the route if it exists
    $deliveryinfoId = $this->route('deliveryinfo') ? $this->route('deliveryinfo')->id : null;

    return [
        'heading' => 'required|unique:delivery_info,heading' . ($deliveryinfoId ? ",$deliveryinfoId" : ''),
        'description' => 'required'
    ];
}

}
