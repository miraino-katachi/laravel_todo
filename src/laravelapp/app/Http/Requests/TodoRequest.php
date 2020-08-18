<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // すべてのパスからのリクエストを許可する。
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
            'expiration_date' => 'required|date',
            'todo_item' => 'required|max:50',
        ];
    }

    /**
     * エラーメッセージのカスタマイズ
     *
     * @return array
     */
    public function messages()
    {
        return [
            'expiration_date.required'=> '期限日を入力してください。',
            'expiration_date.date'=>'日付の形式が正しくありません。',
            'todo_item.required'=>'TODO項目を入力してください。',
            'todo_item.max'=>'TODO項目は50文字以内で入力してください。',
        ];
    }
}
