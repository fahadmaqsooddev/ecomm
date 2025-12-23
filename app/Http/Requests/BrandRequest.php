<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $brandId = $this->route('brand') ? $this->route('brand')->id : null;

        return [
            'name' => 'required|min:3|unique:brands,name' . ($brandId ? ",$brandId" : ''),
            'image' => $brandId ? 'nullable|image|mimes:png,jpg,jpeg,webp' : 'required|image|mimes:png,jpg,jpeg,webp',
        ];
    }

}
