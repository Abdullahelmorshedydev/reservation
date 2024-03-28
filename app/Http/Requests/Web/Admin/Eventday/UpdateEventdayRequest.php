<?php

namespace App\Http\Requests\Web\Admin\Eventday;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventdayRequest extends FormRequest
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
            'event_date' => ['required', 'date_format:Y-m-d', 'after:'.now()],
            'movies' => ['required', 'array'],
            'movies.*' => ['exists:movies,id'],
        ];
    }
}
