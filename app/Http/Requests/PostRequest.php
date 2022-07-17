<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()//規則を決める関数
    {
        return [
            'post.title' => 'required|string|max:100',//post.title←.でつなぐ
            'post.body' => 'required|string|max:4000',
        ];//titleとbodyのルールを定義した。required=入力義務、string=文字制限
    }
}
