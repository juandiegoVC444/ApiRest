<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class BulkStoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //*. porque cada  uno debe de cumpir una regla ejemplo requered  y numero
            '*.customerId' => ['required','integer'],
            '*.amount' => ['required','numeric'],
            '*.status' => ['required',Rule::in(['B','P','V','b','p','v'])],
            '*.billedDate' => ['required','date_format:y-m-d H:i:s'],
            '*.paidDate' => ['date_format:y-m-d H:i:s','nullable']
        ];
    }
    protected function prepareForValidation() {
        $data =[];//data vacia
            foreach ($this->toArray() as $obj){
                $obj['customer_id'] = $obj['customerId'] ?? null; 
                $obj['billed_dated'] = $obj['billedDate'] ?? null; 
                $obj['paid_dated'] = $obj['paidDate'] ?? null; 
                $data[] = $obj;   //todos los obj se añaden a la data   
            }
            $this->merge($data);///mesclamos la data
    }
}
