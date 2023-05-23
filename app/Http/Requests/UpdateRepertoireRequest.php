<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRepertoireRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'actor_ids' => 'array',
            'slug' => [
                'nullable',
                Rule::unique('repertoires', 'slug')->ignore($this->route('repertoire')),
            ],
        ];
    }
}

