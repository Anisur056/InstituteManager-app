<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStudentFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            // `Users` 83 field total, 00 fillable, 2 required- (name, contact_sms)

            // Academic Information- (13 column)
            'joined_at' => 'nullable',
            'academic_year' => 'nullable|date_format:Y',
            'institute_name' => 'nullable',
            'branch' => 'nullable',
            'division' => 'nullable',
            'class' => 'nullable',
            'shift' => 'nullable',
            'section' => 'nullable',
            'group' => 'nullable',
            'roll' => 'nullable',
            'rfid_card' => 'nullable',
            'registration_id' => 'nullable',
            'status' => 'nullable',

            // Users Information- (15 column)
            'name' => 'required|string|max:255',
            'name_bn' => 'nullable',
            'nick_name' => 'nullable',
            'nid' => 'nullable',
            'birth_reg' => 'nullable',
            'date_of_birth' => 'nullable',
            'gender' => 'nullable',
            'blood_group' => 'nullable',
            'health_issues' => 'nullable',
            'height' => 'nullable',
            'weight' => 'nullable',
            'marital_status' => 'nullable',
            'nationality' => 'nullable',
            'religion' => 'nullable',
            'profile_pic' => 'nullable',

            // Contact Information- (5 column)
            'contact_sms' => 'required',
            'contact_whatsapp' => 'nullable',
            'sms_status' => 'nullable',
            'present_address' => 'nullable',
            'permanent_address' => 'nullable',

            // Father Information- (8 column)
            'father_name_en' => 'nullable',
            'father_name_bn' => 'nullable',
            'father_contact' => 'nullable',
            'father_occupation' => 'nullable',
            'father_nid' => 'nullable',
            'father_birth_reg' => 'nullable',
            'father_income' => 'nullable',
            'father_address' => 'nullable',

            // Father Information- (8 column)
            'mother_name_en' => 'nullable',
            'mother_name_bn' => 'nullable',
            'mother_contact' => 'nullable',
            'mother_occupation' => 'nullable',
            'mother_nid' => 'nullable',
            'mother_birth_reg' => 'nullable',
            'mother_income' => 'nullable',
            'mother_address' => 'nullable',

            // Local Guardian Information- (9 column)
            'local_guardian_name_en' => 'nullable',
            'local_guardian_name_bn' => 'nullable',
            'local_guardian_contact' => 'nullable',
            'local_guardian_occupation' => 'nullable',
            'local_guardian_nid' => 'nullable',
            'local_guardian_birth_reg' => 'nullable',
            'local_guardian_income' => 'nullable',
            'local_guardian_address' => 'nullable',
            'local_guardian_relation' => 'nullable',

            // Emergency Information- (4 column)
            'emergency_contact_name' => 'nullable',
            'emergency_contact_relation' => 'nullable',
            'emergency_contact_contact' => 'nullable',
            'emergency_contact_address' => 'nullable',

            // Previous Institute Information- (3 column)
            'previous_institute_name' => 'nullable',
            'previous_institute_address' => 'nullable',
            'previous_institute_info' => 'nullable',

            // Supporting Documents- (10 column)
            'birth_certificate' => 'nullable',
            'vaccination_card' => 'nullable',
            'father_profile_pic' => 'nullable',
            'father_nid_pic' => 'nullable',
            'mother_profile_pic' => 'nullable',
            'mother_nid_pic' => 'nullable',
            'local_guardian_profile_pic' => 'nullable',
            'local_guardian_nid_pic' => 'nullable',
            'previous_institute_certificate' => 'nullable',
            'signature' => 'nullable',

            // Login Information- (4 column)
            'user_name' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
            'role' => 'nullable',
        ];

        // if ($this->method() === 'POST') {
        //     'role' => 'student',
        // }

        // if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
        //     echo "ok";
        // }

        return $rules;
    }


}
