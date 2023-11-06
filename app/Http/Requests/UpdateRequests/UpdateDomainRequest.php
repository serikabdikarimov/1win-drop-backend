<?php

namespace App\Http\Requests\UpdateRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDomainRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:255|unique:localization,name,' . $this->localization,
            'locale_name' => 'required|min:2|max:255|unique:localization,locale_name,' . $this->localization,
            'code' => 'unique:localization,code,' . $this->localization,
            'icon' => 'required|min:3|max:255',
            'is_active' => 'required|in:0,1',
        ];
    }
}
