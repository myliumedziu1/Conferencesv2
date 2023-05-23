<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRepertoireRequest extends FormRequest
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
            'event_name' => 'required',
            'brief_description' => 'required',
            'full_description' => 'required',
            'book' => 'nullable',
            'bookauthor'=> 'nullable',
            'additional1'=> 'nullable',
            'additional2'=> 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'actor_ids' => 'array',
            'slug' => 'nullable|unique:repertoires,slug',
        ];
    }

}
