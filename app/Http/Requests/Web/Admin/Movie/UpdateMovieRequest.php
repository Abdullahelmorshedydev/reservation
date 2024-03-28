<?php

namespace App\Http\Requests\Web\Admin\Movie;

use App\Enums\MovieTypeEnum;
use App\Enums\MovieStatusEnum;
use App\Traits\TranslateTrait;
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
            'name' => TranslateTrait::translate($this->name_en, $this->name_ar),
            'slug' => TranslateTrait::translate($this->name_en, $this->name_ar, true),
            'description' => TranslateTrait::translate($this->description_en, $this->description_ar),
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
            'name_en' => ['required', 'string', Rule::unique('movies', 'name->en')->ignore($this->movie), 'min:3', 'max:255'],
            'name_ar' => ['required', 'string', Rule::unique('movies', 'name->ar')->ignore($this->movie), 'min:3', 'max:255'],
            'name' => ['array'],
            'slug' => ['required'],
            'description_en' => ['required', 'string', 'min:3'],
            'description_ar' => ['required', 'string', 'min:3'],
            'description' => ['array'],
            'showtimes' => ['required', 'array'],
            'showtimes.*' => ['exists:showtimes,id'],
            'price' => ['required', 'numeric'],
            'type' => ['required', 'integer', Rule::in(MovieTypeEnum::cases())],
            'status' => ['required', 'integer', Rule::in(MovieStatusEnum::cases())],
        ];
    }
}
