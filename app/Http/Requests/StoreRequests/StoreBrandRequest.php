<?php

namespace App\Http\Requests\StoreRequests;

use App\Models\Localization;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class StoreBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name), 
        ]);
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
                }),
            ],
            'slug' => [
                'required',
                'max:255',
                Rule::unique('brands')->where(function ($query) use ($domainId) {
                    return $query->where('locale_id', $domainId);
                }),
            ],
        ];
    }
}
