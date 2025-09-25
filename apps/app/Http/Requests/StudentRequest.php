<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $rules = [
            // 'name' => ['required', 'string', 'max:255'],
            // 'description' => ['nullable', 'string'],
            // 'price' => ['required', 'numeric', 'min:0'],
            'name_en' => '',
            'name_bn' => '',
            'rfid_card' => '',
            'status' => '',
            'enrolled_date' => '',
            'profile_pic' => 'nullable|file|image|mimes:jpg,jpeg,png|max:150',
            'academic_year' => 'nullable|date_format:Y',

            'institute_name' => '',
            'shift' => '',
            'class' => '',
            'section' => '',
            'group' => '',
            'roll' => '',
            'date_of_birth' => '',
            'birth_reg' => '',
            'nid' => '',
            'gender' => '',
            'religion' => '',
            'blood_group' => '',
            'health_issues' => '',
            'height' => '',
            'weight' => '',
            'nationality' => '',

            'contact_sms' => '',
            'sms_status' => '',
            'contact_whatsapp' => '',
            'contact_email' => '',
            'present_address' => '',
            'permanent_address' => '',

            'father_name_en' => '',
            'father_name_bn' => '',
            'father_contact' => '',
            'father_occupation' => '',
            'father_birth_reg' => '',
            'father_nid' => '',
            'father_income' => '',

            'mother_name_en' => '',
            'mother_name_bn' => '',
            'mother_contact' => '',
            'mother_occupation' => '',
            'mother_birth_reg' => '',
            'mother_nid' => '',
            'mother_income' => '',

            'local_guardian_name_en' => '',
            'local_guardian_name_bn' => '',
            'local_guardian_relation' => '',
            'local_guardian_contact' => '',
            'local_guardian_nid' => '',
            'local_guardian_address' => '',

            'emergency_contact_name' => '',
            'emergency_contact_relation' => '',
            'emergency_contact_contact' => '',
            'emergency_contact_address' => '',

            'previous_institute' => '',
            'previous_institute_address' => '',
            'previous_institute_tc_number' => '',
            'previous_institute_tc_date' => '',

            'remark' => '',
        ];

        // if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
        //     echo "ok";
        // }

        return $rules;
    }

}
