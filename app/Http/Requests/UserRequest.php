<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            // 'first_name' => 'required|string|min:3|max:50',
            // 'last_name' => 'required|string|min:3|max:50',
            // 'father_name' => 'required|string|min:3|max:50',
            // 'email' => 'required|email|unique:users,email',
            // 'phone_number' => 'required|string|min:9|max:13|unique:users,phone_number',
            // 'id_card_number' => 'required|string|max:13|unique:users,id_card_number',
            // 'salary' => 'required|string|min:0', "max:200000",
            // 'bio' => 'required|string|min:3|max:500',
            // 'password' => 'required|string|min:6',
            // 'gender' => 'required|numeric|min:0|max:1',
            // 'join_date' => 'nullable|date',
            // 'status' => 'required|min:0|max:1',
            // 'date_of_birth' => 'nullable|date',
            // 'marital_status' => 'nullable|numeric|min:0|max:1',
            // 'currency_id' => 'nullable|numeric',
            // 'branch_id' => 'nullable|numeric',
            // 'role_id' => 'nullable|numeric',
        ];
    }
}
