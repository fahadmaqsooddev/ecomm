<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
       $blogId = $this->route('blog') ? $this->route('blog')->id : null;

       return [
           'heading' => [
               'required',
               'unique:blogs,heading' . ($blogId ? ",$blogId" : ''),
           ],
           'description' => 'required|min:10',
           'image' => $blogId ? 'nullable|image|mimes:png,jpg,jpeg,webp' : 'required|image|mimes:png,jpg,jpeg,webp', // Make required if product ID does not exist
       ];
    }
}
