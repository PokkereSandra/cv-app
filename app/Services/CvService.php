<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Bonus;
use App\Models\Description;
use App\Models\Education;
use App\Models\Job;
use App\Models\Language;
use App\Models\Link;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CvService
{
    public function showAll(): Collection
    {
        return User::all()->sortByDesc('created_at');
    }

    public function showOne(int $id)
    {
        return User::where('id', $id)->first();
    }

    public function save(Request $request): RedirectResponse
    {
        //user details

        $user = new User([
            'name' => $request->name,
            'surname' => $request->surname,
            'birth_data' => $request->birth_data,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
        ]);

        if ($request->file('image') == null) {
            $user->image = null;
        } else {
            $user->image = $request->file('image')->store('images', ['disk' => 'public']);
        }
        $user->save();

        //address

        $address = new Address([
            'user_id' => $user->id,
            'country' => $request->country,
            'region' => $request->region,
            'city' => $request->city,
            'parish' => $request->parish,
            'village' => $request->village,
            'house_name' => $request->house_name,
            'street' => $request->street,
            'street_number' => $request->street_number,
            'flat_number' => $request->flat_number,
            'postcode' => $request->postcode,
        ]);
        $address->save();

        //description
        $description = new Description([
            'user_id' => $user->id,
            'content' => $request->person_description,
        ]);
        $description->save();

        //education

        for ($i = 0; $i < count($request->education_level); $i++) {

            $education = new Education([
                'user_id' => $user->id,
                'level' => (int)$request->education_level[$i],
                'university' => $request->university[$i],
                'faculty' => $request->faculty[$i],
                'study_direction' => $request->study_direction[$i],
                'study_status' => (int)$request->education_status[$i],
                'finished_at' => date('y-m-d', strtotime($request->studies_finished_at[$i])),
            ]);
            if ($request->education_studies_finished_at == null) {
                $education->finished_at = null;
            } else {
                $education->finished_at = date('y-m-d', strtotime($request->studies_started_at[$i]));
            }

            if ($request->education_studies_started_at == null) {
                $education->started_at = null;
            } else {
                $education->started_at = date('y-m-d', strtotime($request->studies_started_at[$i]));
            }
            $education->save();
        }

        //job
        for ($i = 0; $i < count($request->company); $i++) {
            $job = new Job([
                'user_id' => $user->id,
                'position' => $request->position[$i],
                'company' => $request->company[$i],
                'workload' => $request->workload[$i],
                'description' => $request->job_description[$i],
                'started_at' => date('y-m-d', strtotime($request->job_started_at[$i])),
            ]);
            if ($request->job_finished_at[$i] == null) {
                $job->finished_at = null;
            } else {
                $job->finished_at = date('y-m-d', strtotime($request->job_finished_at[$i]));
            }

            $job->save();

        }

        //bonus info

        for ($i = 0; $i < count($request->bonus_title); $i++) {
            $bonus = new Bonus([
                'user_id' => $user->id,
                'title' => $request->bonus_title[$i],
                'info' => $request->bonus_description[$i],
            ]);
            $bonus->save();
        }

        //languages

        for ($i = 0; $i < count($request->language); $i++) {
            $language = new Language([
                'user_id' => $user->id,
                'language' => $request->language[$i],
                'level' => $request->language_level[$i],
            ]);
            $language->save();
        }

        //social media

        {
            for ($i = 0; $i < count($request->social_media_url); $i++)
                if ($request->social_media_url[$i] !== null) {
                    $link = new Link([
                        'user_id' => $user->id,
                        'url' => $request->social_media_url[$i],
                        'icon' => (int)$request->social_media_icon[$i],
                    ]);
                    $link->save();
                }
        }
        return Redirect::to('/')->with(['success' => 'Lietotāja ' . $request->name . ' ' . $request->surname . ' CV ir saglabāts'])->withInput();
    }

    public function updateData($request, int $id): RedirectResponse
    {

        $user = User::where('id', $id)->first();

        //updating user details

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->birth_data = $request->birth_data;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;

        if ($request->file('image') == null) {
            $user->image = null;
        } else {
            $user->image = $request->file('image')->store('images', ['disk' => 'public']);
        }
        $user->save();

        //updating address

        $address = Address::where('user_id', $id)->first();

        $address->country = $request->country;
        $address->region = $request->region;
        $address->city = $request->city;
        $address->parish = $request->parish;
        $address->village = $request->village;
        $address->house_name = $request->house_name;
        $address->street = $request->street;
        $address->street_number = $request->street_number;
        $address->flat_number = $request->flat_number;
        $address->postcode = $request->postcode;


        $address->save();

        //updating description

        $description = Description::where('user_id', $id)->first();

        $description->content = $request->person_description;

        $description->save();

        //updating education

        if ($request->education_id !== null) {
            for ($i = 0; $i < count($request->education_id); $i++) {
                if ($request->education_id[$i] !== null) {
                    $education = Education::where('id', $request->education_id[$i])->first();
                } else {
                    $education = new Education();
                }
                $education->user_id = $id;
                $education->level = (int)$request->education_level[$i];
                $education->university = $request->university[$i];
                $education->faculty = $request->faculty[$i];
                $education->study_direction = $request->study_direction[$i];
                $education->study_status = (int)$request->education_status[$i];


                if ($request->studies_finished_at[$i] == null) {
                    $education->finished_at = null;
                } else {
                    $education->finished_at = date('y-m-d', strtotime($request->studies_finished_at[$i]));
                }

                if ($request->studies_started_at[$i] == null) {
                    $education->started_at = null;
                } else {
                    $education->started_at = date('y-m-d', strtotime($request->studies_started_at[$i]));
                }
                $education->save();
            }
        }

        //updating job
        for ($i = 0; $i < count($request->job_id); $i++) {
            if ($request->job_id[$i] !== null) {
                $job = Job::where('id', $request->job_id[$i])->first();
            } else {
                $job = new Job();
            }
            $job->user_id = $user->id;
            $job->position = $request->position[$i];
            $job->company = $request->company[$i];
            $job->workload = $request->workload[$i];
            $job->description = $request->job_description[$i];
            $job->started_at = date('y-m-d', strtotime($request->job_started_at[$i]));

            if ($request->job_finished_at[$i] == null) {
                $job->finished_at = null;
            } else {
                $job->finished_at = date('y-m-d', strtotime($request->job_finished_at[$i]));
            }

            $job->save();
        }
        //update bonus info

        for ($i = 0; $i < count($request->bonus_id); $i++) {
            if ($request->bonus_id[$i] !== null) {
                $bonus = Bonus::where('id', $request->bonus_id[$i])->first();
            } else {
                $bonus = new Bonus();
            }

            $bonus->user_id = $user->id;
            $bonus->title = $request->bonus_title[$i];
            $bonus->info = $request->bonus_description[$i];

            $bonus->save();
        }

        //update languages

        for ($i = 0; $i < count($request->language_id); $i++) {
            if ($request->language_id[$i] !== null) {
                $language = Language::where('id', $request->language_id[$i])->first();
            } else {
                $language = new Language();
            }
            $language->user_id = $user->id;
            $language->level = $request->language_level[$i];
            $language->language = $request->language[$i];

            $language->save();
        }

        //update social sites

        for ($i = 0; $i < count($request->site_id); $i++) {
            if ($request->site_id[$i] !== null) {
                $link = Link::where('id', $request->site_id[$i])->first();
            } else {
                $link = new Link();
            }
            $link->user_id = $user->id;
            $link->url = $request->social_media_url[$i];
            $link->icon = $request->social_media_icon[$i];

            $link->save();
        }

        return Redirect::back()->with(['success' => 'Lietotāja ' . $request->name . ' ' . $request->surname . ' CV dati ir nomainīti']);

    }

    public function deleteCV($request): RedirectResponse
    {
        User::find($request->user_id)->delete();

        return Redirect::back()->with(['success' => 'CV ir izdzēsts']);
    }

}


