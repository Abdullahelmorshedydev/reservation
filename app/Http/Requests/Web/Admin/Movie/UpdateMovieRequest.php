<?php

namespace App\Http\Requests\Web\Admin\Movie;

use App\Enums\MovieTypeEnum;
use App\Enums\MovieStatusEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            'slug' => str_replace(' ', '-', $this->name),
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
            'name' => ['required', 'string', 'unique:movies,name,' . $this->movie->slug, 'min:3', 'max:255'],
            'slug' => ['required'],
            'description' => ['required', 'string', 'min:3'],
            'price' => ['required', 'numeric'],
            'type' => ['required', 'integer', Rule::in(MovieTypeEnum::cases())],
            'status' => ['required', 'integer', Rule::in(MovieStatusEnum::cases())],
        ];
    }
}
