<?php

namespace App\Http\Requests\User;

// declare path model (bahwa request ini untuk model User)
use App\Models\User;

// request from form
use Illuminate\Foundation\Http\FormRequest;

// to send response
use Symfony\Component\HttpFoundation\Response;


class StoreuserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        //  create midleware from kernel here

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
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'unique:users',
                'string',
                'max:255'
            ],
            'password' => [
                'min:8',
                'string',
                'max:255',
                'mixedCase' //to mix charactrer
            ],
        ];
    }
}
