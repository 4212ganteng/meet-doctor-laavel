<?php

namespace App\Http\Requests\Role;

// declare path model (bahwa request ini untuk model User)
use App\Models\ManagementAccess\Role;

// request from form
use Illuminate\Foundation\Http\FormRequest;

// to send response
use Symfony\Component\HttpFoundation\Response;

// add this code (only at Update Request FOR UNIQUE)
use Illuminate\Validation\Rule;

class UpdateroleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
     // change to true, cause midle ware we set on request
     return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //field request and validation
            'title' => [
                'required',
                'string',
                // call RULE (berikan peraturan pada tabel user JIKA USER MELAKUKAN UPDATE KE EMAIL YANG KE DAFTAR di user lain)
                Rule::unique('role')->ignore($this->role),
                'max:255'
            ],
        ];
    }
}
