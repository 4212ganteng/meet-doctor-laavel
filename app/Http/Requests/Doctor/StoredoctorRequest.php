<?php

namespace App\Http\Requests\Doctor;

// declare path model (bahwa request ini untuk model User)
use App\Models\Operational\Doctor;

//use this after set middleware on auth gates
use Gate;

// request from form
use Illuminate\Foundation\Http\FormRequest;

// to send response
use Symfony\Component\HttpFoundation\Response;

class StoredoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

          // use this after set midleware on auth gates
          abort_if(Gate::denise('Doctor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'specialist_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'required',
                'string',
                'max:250'
            ],
            'fee' => [
                'required',
                'integer',
                'max:250'
            ],
            'photo' => [
                'nullable',
                'string',
                'max:10000',
            ],
        ];
    }
}
