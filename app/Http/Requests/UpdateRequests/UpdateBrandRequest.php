<?php

namespace App\Http\Requests\UpdateRequests;

use App\Models\Domain;
use App\Models\Localization;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest
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
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        return [
            'logo' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'name' => [
                'required',
                'max:255',
                Rule::unique('brands')->where(function ($query) use ($domainId) {
                    return $query->where('locale_id', $domainId);
                })->ignore($this->name, 'name'),
            ],
            'slug' => [
                'max:255',
                Rule::unique('brands')->where(function ($query) use ($domainId) {
                    return $query->where('locale_id', $domainId);
                })->ignore($this->slug, 'slug'),
            ]
        ];
    }
}
