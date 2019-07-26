<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SearchRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'searchQuery.departureAirport' => 'required|string',
            'searchQuery.arrivalAirport' => 'required|string|different:searchQuery.departureAirport',
            'searchQuery.departureDate' => 'required|date|date_format:Y-m-d|after:yesterday',
        ];
    }

    public function  attributes()
    {
        return [
            'searchQuery.departureAirport' => 'Departure Airport',
            'searchQuery.arrivalAirport' => 'Arrival Airport',
            'searchQuery.departureDate' => 'Departure Date'
        ];
    }

    /**
     * Format errors
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors()
            ], 422));
    }
}
