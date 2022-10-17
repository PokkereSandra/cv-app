<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class CvValidationRules
{
    public function validateCV($request)
    {
        return Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'birth_data' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'person_description' => 'required',
            'country' => 'required',
            'region' => 'required',
            'postcode' => 'required',
            'education_level' => 'required|array',
            'education_level.*' => 'integer',
            'education_status' => 'required|array',
            'education_status.*' => 'integer',
            'university' => 'required|array',
            'university.*' => 'string',
            'company' => 'required|array',
            'company.*' => 'string',
            'position' => 'required|array',
            'position.*' => 'string',
            'workload' => 'required|array',
            'workload.*' => 'integer',
            'job_description' => 'required|array',
            'job_description.*' => 'string',
            'job_started_at' => 'required|array',
            'job_started_at.*' => 'string',
            'bonus_title' => 'required|array',
            'bonus_title.*' => 'string',
            'bonus_description' => 'required|array',
            'bonus_description.*' => 'string',
            'language' => 'required|array',
            'language.*' => 'string',
            'language_level' => 'required|array',
            'language_level.*' => 'integer',
            'social_media_icon' => 'required|array',
            'social_media_icon.*' => 'integer',
            'social_media_url' => 'required|array',
            'social_media_url.*' => 'string',

        ],
            [
                'required' => 'Obligāti aizpildāms lauciņš',
                'integer' => 'Obligāti aizpildāms lauciņš',
                'string' => 'Obligāti aizpildāms lauciņš',
                'array' => 'Obligāti aizpildāms lauciņš',
            ]);
    }
}
