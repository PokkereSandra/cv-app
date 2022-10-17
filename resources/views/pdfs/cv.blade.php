<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CV</title>
    <style>
        .page-break {
            page-break-after: auto;
        }
    </style>
    <style>
        body {
            font-family: 'DejaVu Sans';
        }
    </style>
</head>
<body>
<!--PERSONAL INFO BLOCK-->
<div>
    @if(isset($user->image))
        <div style="width: 20%; float:left; padding: 25px 10px 10px 20px;">
            <img src="{{asset('/storage/'.$user->image)}}" alt="foto" style="height: 150px;width: 100px">
        </div>
    @else
        <div style="width: 20%; float:left; padding: 25px 10px 10px 20px;">
            <img src="{{asset('/no-profile-image.png')}}" alt="foto" style="height: 150px;width: 100px">
        </div>
    @endif
    <div style="width: 80%; float:left; padding-top: 13px">
        {{$user->name}} {{$user->surname}}<br>
        dz. {{date('d.m.Y', strtotime($user->birth_data))}}<br>
        tel. nr.: {{$user->phone_number}}<br>
        e-pasts: {{$user->email}}<br>
        adrese:<br>
        @if(isset($user->address->flat_number))
            {{$user->address->street}} {{$user->address->street_number}} - {{$user->address->flat_number}},
            {{$user->address->city}},<br>
        @endif
        @if(isset($user->address->house_name))
            {{$user->address->house_name}},{{$user->address->parish}},{{$user->address->village}},<br>
        @endif
        {{$user->address->region}},
        {{$user->address->country}},
        {{$user->address->postcode}}
    </div>
</div>

<div style="position:relative; margin-top: 10px">
    <h5>Meklē mani soctīklos:</h5>
    @foreach($user->links as $link)
        <a href="{{$link->url}}" target="_blank" style="text-decoration: none; color:black">
            <i class="{{$link->getSocialSiteIcon($link->icon)}}"></i>
            {{$link->url}}
        </a><br>
    @endforeach
</div>
<!--PERSON DESCRIPTION BLOCK-->
<div>
    <h5>Par mani:</h5>
    {{$user->description->content}}<br>
</div>

<!--EDUCATION BLOCK-->
<div>
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

<!--JOB BLOCK-->
<div class="page-break">
    <h5>DARBA PIEREDZE</h5>
    @foreach($user->jobs as $job)
        {{date('d.m.Y', strtotime($job->started_at))}}-
        @if(isset($job->finished_at))
            {{date('d.m.Y', strtotime($job->finished_at))}}
            <br>
        @else
            šobrīd <br>
        @endif
        Uzņēmums: {{$job->company}}<br>
        Amats: {{$job->position}} ({{$job->getWorkLoad($job->workload)}})<br>
        Galvenie pienākumi: {{$job->description}}<br>
    @endforeach
</div>

<!--BONUS INFO BLOCK-->
<div>
    <h5>PAPILDINFORMĀCIJA</h5>
    @foreach($user->bonuses as $bonus)
        {{$bonus->title}}: {{$bonus->info}}<br>
    @endforeach
</div>

<!--LANGUAGES BLOCK-->
<div>
    <h5>VALODU PRASMES</h5>
    @foreach($user->languages as $lang)
        {{$lang->language}}: {{$lang->getLanguageSkillLevel($lang->level)}}<br>
    @endforeach
</div>


</body>
</html>
