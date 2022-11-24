<?php

namespace App\Http\Requests\ConfigPayment;

// declare path model (bahwa request ini untuk model User)
use App\Models\Masterdata\ConfigPayment ;

// request from form
use Illuminate\Foundation\Http\FormRequest;

// to send response
use Symfony\Component\HttpFoundation\Response;

class UpdateconfigpaymentRequest extends FormRequest
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
           
            'fee' => [
                'required',
                'string',
                'max:250'
            ],
            'vat' => [
                'nullable',
                'string',
                'max:10000',
            ],
        ];
    }
}
