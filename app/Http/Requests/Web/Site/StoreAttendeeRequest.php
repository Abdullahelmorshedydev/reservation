<?php

namespace App\Http\Requests\Web\Site;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'name' => $this->firstname . ' ' . $this->lastname,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string', 'min:3', 'max:255'],
            'lastname' => ['required', 'string', 'min:3', 'max:255'],
            'middlename' => ['nullable'],
            'name' => ['required'],
            'email' => ['required', 'email:rfc', 'regex:/(.+)@(.+)\.(.+)/i', 'min:3', 'max:255'],
            'phone' => ['required', 'min:9', 'max:20'],
            'eventday_id' => ['required', 'exists:eventdays,id'],
            'movie_id' => ['required', 'exists:movies,id'],
            'showtime_id' => ['required', 'exists:showtimes,id'],
        ];
    }
}
