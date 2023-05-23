<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActorRequest extends FormRequest
{
public function authorize()
{
return true; // or apply your authorization logic here
}

public function rules()
{
return [
'name' => 'required',
'birth_date' => 'required|date',
'description' => 'required',
'photo' => 'nullable|image|mimes:jpeg,png,jpg', // Update the rule for 'photo'
'actor_type' => 'required|in:regular,guest',
'notes' => 'nullable',
'text_field' => 'nullable'
];
}

public function withValidator($validator)
{
$validator->after(function ($validator) {
if ($this->hasFile('photo') && !$this->file('photo')->isValid()) {
$validator->errors()->add('photo', 'The uploaded file is not valid.');
}
});
}
}
