<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
        // Get the testimonial ID from the route if it exists
        $testimonialId = $this->route('testimonial') ? $this->route('testimonial')->id : null;

        return [
            'heading' => 'required|min:3',
            'designation'=>'required',
            'description' => 'required',
            'image' => 'required',
        ];
    }

}
