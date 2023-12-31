<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
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
            'id' => 'required|string|max:80',
            'student_id' => 'required|string',
            'subject_id' => 'string',
            'schedule_type' => 'string',
            'hari'=> 'string',
            'jam_mulai'=> 'string',
            'jam_selesai'=> 'string',
            'ruangan'=> 'string',
            'kode_absensi'=> 'string',
            'tahun_akademik'=> 'string',
            'semester'=> 'string',
            'created_by'=> 'string',
            'update_by'=> 'string',
            'delete_by'=> 'string',

        ];
    }
}
