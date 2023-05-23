<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActorRequest extends FormRequest
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
'actor_type' => 'required|in:regular,guest',
'photo' => 'required|image|mimes:jpeg,png,jpg' // Restrict to image file types and set max file size
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
