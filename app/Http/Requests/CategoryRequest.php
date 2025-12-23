<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
    public function rules()
    {
        // Check if the route has a category ID, indicating an update
        $categoryId = $this->route('category') ? $this->route('category')->id : null;

        $rules = [
            'categoryname' => 'required|string|max:255',
            
        ];

        // If updating, add unique rule ignoring the current ID
        if ($categoryId) {
            $rules['categoryname'] .= '|unique:categories,name,' . $categoryId;
            $rules['image']='nullable|mimes:jpg,png,jpeg,webp';
        } else {
            // If creating, ensure it is unique without an ID
            $rules['categoryname'] .= '|unique:categories,name';
            $rules['image']='required|mimes:jpg,png,jpeg,webp';

        }

        return $rules;
    }

     public function messages()
    {
        return [
            'name.required' => 'The category name is required.',
            'name.string' => 'The category name must be a string.',
            'name.max' => 'The category name may not be greater than :max characters.',
            'name.unique' => 'The category name must be unique. It has already been taken.',
        ];
    }
}
