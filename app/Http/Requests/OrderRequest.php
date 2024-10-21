<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'phone' => ['required'],
            'payment_method' => ['required', Rule::in(array_keys(Order::TYPE_PAYMENT))]
        ];
    }

    public function messages()
    {
        $listType = implode(", ", Order::TYPE_PAYMENT);
        return [
            'name.required'=> __("Vui lòng nhập họ và tên"),
            'email.required'=> __("Vui lòng nhập địa chỉ email"),
            'email.email'=> __("Vui lòng nhập địa chỉ email hợp lệ"),
            'address.required'=> __("Vui lòng nhập địa chỉ"),
            'phone.required'=> __("Vui lòng nhập số điện thoại"),
            'payment_method.required'=> __("Vui lòng chọn phương thức thanh toán"),
            'payment_method.in'=> __("Vui lòng chọn phương thức thanh toán phù hợp: ") . $listType,
        ];
    }
}
