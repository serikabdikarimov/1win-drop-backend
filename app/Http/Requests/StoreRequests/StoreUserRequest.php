<?php

namespace App\Http\Requests\StoreRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Domain;
use App\Models\Localization;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'avatar' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'password' => 'required|min:8|confirmed',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->where(function ($query) use ($domainId) {
                    return $query->where('locale_id', $domainId);
                }),
            ],
        ];
    }
}
