<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Session;

class NewCreateRequest extends Request
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
            //
        ];
    }

    public function fillData()
    {
        $user = Session::get('user.passport');
        return [
            'id' => $this->id ?: null,
            'user_id' => isset($user['id']) ? $user['id'] : 0,
            'category_id' => $this->category_id,
            'corp_id' => $this->corp_id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->new_content,
            'logo' => $this->logo ? str_replace(config('app.static_url'), '', $this->logo) : '',
        ];
    }
}
