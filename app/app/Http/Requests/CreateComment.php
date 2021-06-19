<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateComment extends FormRequest
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
    public function rules(): array
    {
        return [
            'news_id' => ['required', 'integer'],
            'user_name' => ['required', 'string', 'min:1', 'max:15'],
            'content' => ['required']
        ];
    }

    public function attributes(): array
    {
        return [
            'user_name' => 'Никнейм',
            'content' => 'Комментарий'
        ];
    }
}
