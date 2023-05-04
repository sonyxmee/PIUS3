<?php

namespace App\Http\Api\V1\Modules\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT'){
            return [
                'name' => ['required'],
                'price' => ['required'],
                'stock' => ['required'],
                'category_id' => ['required'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'price' => ['sometimes', 'required'],
                'stock' => ['sometimes', 'required'],
                'category_id' => ['sometimes', 'required'],
            ];
        }
    }

    // protected function prepareForValidation(){
    //     $this->merge([
    //         'category_id' => $this->categoryId
    //     ]);
    // }
}
