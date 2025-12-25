<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            // Get the product ID from the route if it exists
            $productId = $this->route('product') ? $this->route('product')->id : null;

            return [
                'category_id' => 'required|integer',
                'name' => [
                    'required',
                    'unique:products,name' . ($productId ? ",$productId,id" : ''),
                ],
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'description' => 'required|min:10',
                'image' => $productId ? 'nullable|image|mimes:png,jpg,jpeg,webp,jfif' : 'required|image|mimes:png,jpg,jpeg,webp,jfif', // Make required if product ID does not exist
            ];
        }

        public function messages()
        {
            return [
                'category_id.required' => 'The category name is required.',
                'category_id.integer' => 'The category name must be an integer.'
            ];

        }



}
