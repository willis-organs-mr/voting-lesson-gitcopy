<?php

namespace App\Http\Requests;

use App\Channel;
use Illuminate\Foundation\Http\FormRequest;

class ChannelForm extends FormRequest
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
            'title' => 'required',
            'slug' => 'required',
            'colour' => 'required'
        ];
    }

    /**
     * Persist the community link submission form
     */
    public function persist()
    {
        Channel::from(auth()->user())
            ->contribute($this->all());
    }
}
