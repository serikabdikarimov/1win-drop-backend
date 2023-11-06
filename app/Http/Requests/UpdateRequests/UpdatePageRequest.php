<?php

namespace App\Http\Requests\UpdateRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Models\Domain;
use App\Models\Localization;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        return [
            'name' => 'required|min:3|max:255',
            'title.*' => 'required|min:3|max:255',
            'banner' => 'max:255',
            'status' => 'required|in:0,1,2',
            'slug' => [
                'required',
                'max:255',
                Rule::unique('pages')->where(function ($query) use ($domainId) {
                    return $query->where('locale_id', $domainId);
                })->ignore($this->slug, 'slug'),
            ]
        ];
    }
}
