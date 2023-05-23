<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // update this based on your authorization rules
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'PATCH':
            case 'PUT':
            case 'POST':
            {
                return [
                    'repertoire_id' => 'required|exists:repertoires,id',
                    'event_type' => 'required|in:Live,Online',
                    'ticket_url' => 'required|url',
                    'location' => 'nullable',
                    'event_date' => 'nullable|date',
                ];
            }
            default: break;
        }
    }
}
