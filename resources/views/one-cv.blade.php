@extends('layouts.cv-app')
@section('content')
    <div class="container">
        <div class="row underline">
            <div class="col-md-12 buttons">
                <a href="{{asset('/')}}" class="btn btn-outline-dark">CV saraksts</a>
                <a href="{{asset('/edit/'.$user->id)}}" class="btn btn-outline-dark">Labot</a>
                <a href="{{asset('/pdf/'.$user->id)}}" target="_blank" class="btn btn-outline-dark">Skatīt PDF</a>
            </div>
        </div>
        <!--PERSONAL INFO BLOCK-->
        <div class="row underline">
            @if(isset($user->image))
                <div class="col-md-2 personal-info-block">
                    <img src="{{asset('./storage/'.$user->image)}}" alt="foto" class="rounded profile-image">
                </div>
            @else
                <div class="col-md-2 personal-info-block">
                    <img src="{{asset('/no-profile-image.png')}}" alt="foto" class="rounded profile-image">
                </div>
            @endif
            <div class="col-md-4 personal-info-block">
                <h5>{{$user->name}} {{$user->surname}}</h5>
                dz. {{date('d.m.Y', strtotime($user->birth_data))}}<br>
                tel. nr.: {{$user->phone_number}}<br>
                e-pasts: {{$user->email}}<br>
                adrese:<br>
                @if(isset($user->address->flat_number))
                    {{$user->address->street}} {{$user->address->street_number}} - {{$user->address->flat_number}},
                    {{$user->address->city}},<br>
                @endif
                @if(isset($user->address->house_name))
                    {{$user->address->house_name}},{{$user->address->parish}},{{$user->address->village}},
                @endif
                {{$user->address->region}},
                {{$user->address->country}},
                {{$user->address->postcode}}
            </div>
            <div class="col-md-4 personal-info-block">
                <div class="row">
                    @foreach($user->links as $link)
                        <div class="col-md-12">
                            <a href="{{$link->url}}" target="_blank" class="link">
                                <i class="{{$link->getSocialSiteIcon($link->icon)}}"></i>
                                {{$link->url}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!--PERSON DESCRIPTION BLOCK-->
        @if(isset($user->descriptions))
            @foreach($user->descriptions as $description)
                <div class="row underline">
                    <div class="col-md-12 personal-description-block">
                        <p>Personas apraksts: {{$description->content}}</p>
                    </div>
                </div>
            @endforeach
        @endif

        <!--EDUCATION BLOCK-->
        <div class="row underline">
            <div class="col-md-12 education-block">
                <h5>IZGLĪTĪBA</h5>
                @foreach($user->educations as $education)
                    {{$education->getEducationLevel($education->level)}}<br>
                    Izglītības iestāde:  {{$education->university}}
                    : {{$education->getEducationStatus($education->study_status)}}<br>
                    Studiju virziens: {{$education->study_direction}}
                    @if(isset($education->started_at))
                        ({{date('d.m.Y', strtotime($education->started_at))}}
                        - {{date('d.m.Y', strtotime($education->finished_at))}})<br>
                    @endif
                @endforeach
            </div>
        </div>

        <!--JOB BLOCK-->
        <div class="row underline">
            <div class="col-md-12 job-block">
                <h5>DARBA PIEREDZE</h5>
                @foreach($user->jobs as $job)
                    {{date('d.m.Y', strtotime($job->started_at))}} -
                    @if(isset($job->finished_at))
                        {{date('d.m.Y', strtotime($job->finished_at))}}
                        <br>
                    @else
                        šobrīd <br>
                    @endif
                    Uzņēmums: {{$job->company}}<br>

                    @if(isset($job->reference->job_id))
                        Rekomendācijas: <br>
                        {{$job->reference->name}} {{$job->reference->surname}}, {{$job->reference->email}} <br>
                    @endif
                    Amats: {{$job->position}} ({{$job->getWorkLoad($job->workload)}})<br>
                    Galvenie pienākumi: {{$job->description}}<br>
                @endforeach
            </div>
        </div>

        <!--BONUS INFO BLOCK-->
        @if(isset($user->bonuses))
            <div class="row underline">
                <div class="col-md-12 job-block">
                    <h5>PAPILDINFORMĀCIJA</h5>
                    @foreach($user->bonuses as $bonus)
                        {{$bonus->title}}: {{$bonus->info}}<br>
                    @endforeach
                </div>
            </div>
        @endif

        <!--LANGUAGES BLOCK-->
        @if(isset($user->languages))
            <div class="row underline">
                <div class="col-md-12 job-block">
                    <h5>VALODU PRASMES</h5>
                    @foreach($user->languages as $lang)
                        {{$lang->language}}: {{$lang->getLanguageSkillLevel($lang->level)}}<br>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
