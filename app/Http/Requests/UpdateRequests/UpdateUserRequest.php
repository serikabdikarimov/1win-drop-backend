<?php

namespace App\Http\Requests\UpdateRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user')->id; // Получаем id текущей записи
        $domainId = $this->route('domain')->id; // Получаем id текущего домена
        return [
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->where(function ($query) use ($domainId) {
                    return $query->where('locale_id', $domainId);
                })->ignore($userId)
            ],
            'password' => 'required|confirmed|min:8',
        ];
    }
}
