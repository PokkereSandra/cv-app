@extends('layouts.cv-app')
@section('content')
    <div class="container">
        <div class="row underline">
            <div class="col-md-2">
                <a href="{{asset('/')}}">
                    <button class="btn btn-outline-success add-button">Skatīt visus CV</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="POST" id="cv_form" class="form-group" action="{{asset('/add')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <!--personal data -->
                    <div class="row underline">
                        <div class="col-md-5">
                            <div class="row mb-3">
                                <h5>Personas dati</h5>
                            </div>
                            <div class="row mb-3">
                                @error('name')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <label class="col-sm-2 col-form-label col-form-label-sm required"
                                       for="name">Vārds</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm required" id="name" name="name"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                @error('surname')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <label class="col-sm-2 col-form-label col-form-label-sm required"
                                       for="surname">Uzvārds</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm" id="surname" name="surname"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                @error('birth_data')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <label class="col-sm-4 col-form-label col-form-label-sm required" for="birth_data">Dzimšanas
                                    dati</label>
                                <div class="col-sm-8">
                                    <input class="form-control form-control-sm" type="date" id="birth_data"
                                           name="birth_data"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                @error('phone_number')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <label class="col-sm-4 col-form-label col-form-label-sm required" for="phone_number">Tālruņa
                                    numurs</label>
                                <div class="col-sm-8">
                                    <input class="form-control form-control-sm" id="phone_number" name="phone_number"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                @error('email')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <label class="col-sm-3 col-form-label col-form-label-sm required"
                                       for="email">E-pasts</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm" type="email" id="email" name="email"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label col-form-label-sm" for="image">Augšupielādēt
                                    foto</label>
                                <div class="col-sm-8">
                                    <input class="form-control-file form-control-sm" type=file id="image" name="image"/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                @error('person_description')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <label class="col-form-label col-form-label-sm required" for="person_description">Īss
                                    personas
                                    raksturojums</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control form-control-sm" id="person_description"
                                              name="person_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <h5>Adrese</h5>
                            </div>
                            <div class="row mb-3">
                                @error('country')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <label class="col-sm-4 col-form-label col-form-label-sm required"
                                       for="country">Valsts</label>
                                <div class="col-sm-8">
                                    <input class="form-control form-control-sm" id="country" name="country"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                @error('region')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <label class="col-sm-4 col-form-label col-form-label-sm required"
                                       for="region">Novads</label>
                                <div class="col-sm-8">
                                    <input class="form-control form-control-sm" id="region" name="region"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label col-form-label-sm" for="city">Pilsēta</label>
                                <div class="col-sm-8">
                                    <input class="form-control form-control-sm" id="city" name="city"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label col-form-label-sm" for="parish">Pagasts</label>
                                <div class="col-sm-8">
                                    <input class="form-control form-control-sm" id="parish" name="parish"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label col-form-label-sm" for="village">Ciems</label>
                                <div class="col-sm-8">
                                    <input class="form-control form-control-sm" id="village" name="village"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-1 col-form-label col-form-label-sm" for="street">Iela</label>
                                <div class="col-sm-4">
                                    <input class="form-control form-control-sm" id="street" name="street"/>
                                </div>
                                <label class="col-sm-1 col-form-label col-form-label-sm" for="street_number">Nr.</label>
                                <div class="col-sm-2">
                                    <input class="form-control form-control-sm" id="street_number"
                                           name="street_number"/>
                                </div>
                                <label class="col-sm-2 col-form-label col-form-label-sm"
                                       for="flat_number">dzīvoklis</label>
                                <div class="col-sm-2">
                                    <input class="form-control form-control-sm" id="flat_number" name="flat_number"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="house_name">Mājas
                                    nosaukums</label>
                                <div class="col-sm-7">
                                    <input class="form-control form-control-sm" id="house_name" name="house_name"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                @error('postcode')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <label class="col-sm-4 col-form-label col-form-label-sm required" for="postcode">Pasta
                                    indekss</label>
                                <div class="col-sm-8">
                                    <input class="form-control form-control-sm" id="postcode" name="postcode"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--education -->
                    <div class="row underline">
                        <div class="row">
                            <h5>Izglītība</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row mb-3">
                                    @error('education_level.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                                           for="education_level[]">Izglītības
                                        līmenis</label>
                                    <div class="col-sm-8">
                                        <select class="form-select form-select-sm" name="education_level[]"
                                                id="education_level[]">
                                            <option selected value="">---</option>
                                            @foreach(\App\Models\Education::getEducationLevels() as $value=>$level)
                                                <option value="{{$value}}">{{$level}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    @error('education_status.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                                           for="education_status[]">Studiju
                                        statuss</label>
                                    <div class="col-sm-8">
                                        <select class="form-select form-select-sm" id="education_status[]"
                                                name="education_status[]">
                                            <option selected value="">---</option>
                                            @foreach(\App\Models\Education::getEducationStatuses() as $value=>$status)
                                                <option value="{{$value}}">{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label col-form-label-sm" for="studies_started_at[]">Uzsāku: </label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm" type="date"
                                               id="studies_started_at[]"
                                               name="studies_started_at[]">
                                    </div>
                                    <label class="col-sm-2 col-form-label col-form-label-sm"
                                           for="studies_finished_at[]">Pabeidzu: </label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm" type="date"
                                               name="studies_finished_at[]"
                                               id="studies_finished_at[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    @error('university.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                                           for="university[]">Izglītības
                                        iestāde</label>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm" id="university[]"
                                               name="university[]"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label col-form-label-sm"
                                           for="faculty[]">Fakultāte</label>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm" id="faculty[]" name="faculty[]"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label col-form-label-sm" for="study_direction[]">Studiju
                                        virziens</label>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm" id="study_direction[]"
                                               name="study_direction[]"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="education_block_id" class="row"></div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <button class="btn btn-secondary add-education-button form-control-sm">+
                                    izglītība
                                </button>
                            </div>
                        </div>
                    </div>


                    <!-- Job -->
                    <div class="row underline">
                        <div class="row">
                            <h5>Darba pieredze</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row mb-3">
                                    @error('company.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                                           for="company[]">Uzņēmums</label>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm" type="text" name="company[]"
                                               id="company[]">
                                    </div>
                                </div>
                                @error('position.*')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                                           for="position[]">Amats</label>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm" type="text" name="position[]"
                                               id="position[]">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    @error('workload.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-4 col-form-label col-form-label-sm required" for="workload[]">Slodzes
                                        apmērs</label>
                                    <div class="col-sm-8">
                                        <select class="form-select form-select-sm" name="workload[]" id="workload[]">
                                            <option selected value="">---</option>
                                            @foreach(\App\Models\Job::getWorkLoads() as $value=>$load)
                                                <option value="{{$value}}">{{$load}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    @error('job_description.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                                           for="job_description[]">Darba
                                        apraksts</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control form-control-sm" name="job_description[]"
                                                  id="job_description[]"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    @error('job_started_at.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-2 col-form-label col-form-label-sm required"
                                           for="job_started_at[]">No</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm" type="date" name="job_started_at[]"
                                               id="job_started_at[]">
                                    </div>
                                    <label class="col-sm-2 col-form-label col-form-label-sm"
                                           for="job_finished_at[]">līdz</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm" type="date" name="job_finished_at[]"
                                               id="job_finished_at[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row" id="job_block_id"></div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <button class="btn btn-secondary add_job_button">+
                                    darba vieta
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- BONUS KNOWLEDGE -->
                    <div class="row underline">
                        <div class="row">
                            <h5>Papildprasmes</h5>
                            <p>Pievieno papildus prasmes un to aprakstu(piemēram, B kategorijas autovadītāja
                                apliecība, iegūta
                                2008.
                                gadā)</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    @error('bonus_title.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                                           for="bonus_title[]">Prasme</label>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm" name="bonus_title[]"
                                               id="bonus_title[]">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    @error('bonus_description.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                                           for="bonus_description[]">Apraksts</label>
                                    <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" name="bonus_description[]"
                                      id="bonus_description[]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bonus_knowledge_id" class="row"></div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <button class="add_bonus_knowledge btn btn-secondary">+ prasme
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--LANGUAGES-->
                    <div class="row underline">
                        <div class="row">
                            <h5>Valodu zināšanas</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    @error('language.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                                           for="language[]">Valoda</label>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm" name="language[]" id="language[]">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    @error('language_level.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                                           for="language_level[]">Novērtē
                                        zināšanu līmeni</label>
                                    <div class="col-sm-8">
                                        <select class="form-select form-select-sm" id="language_level[]"
                                                name="language_level[]">
                                            <option selected value="">---</option>
                                            @foreach(\App\Models\Language::getLanguageSkillLevels() as $value=>$skillLevel)
                                                <option value="{{$value}}">{{$skillLevel}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="language_block_id" class="row"></div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <button class="col-md-6 add_language_button btn btn-secondary">+ valoda
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--SOCIAL MEDIA LINKS -->
                    <div class="row underline">
                        <div class="row">
                            <h5>Sociālo tīklu linki</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row mb-3">
                                    @error('social_media_icon.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-3 col-form-label col-form-label-sm required"
                                           for="social_media_icon[]">Izvēlies
                                        soctīklu</label>
                                    <div class="col-sm-2">
                                        <select class="form-select form-select-sm" id="social_media_icon[]"
                                                name="social_media_icon[]">
                                            <option selected value="">---</option>
                                            @foreach(\App\Models\Link::getSocialSites() as $value=>$site)
                                                <option value="{{$value}}">{{$site}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('social_media_url.*')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <label class="col-sm-2 col-form-label col-form-label-sm required"
                                           for="social_media_url[]">Iekopē
                                        saiti</label>
                                    <div class="col-sm-5">
                                        <input class="form-control form-control-sm" name="social_media_url[]"
                                               id="social_media_url[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="social_media_block_id" class="row"></div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <button class="add_social_media_button btn btn-secondary">+ soctīkls
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--FOOTER-->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline-success">Saglabāt CV</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!--SCRIPTS-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <!--add education block script -->
        <script>
            $(document).ready(function () {
                $(".add-education-button").click(function (e) {
                    e.preventDefault();
                    $("#education_block_id").prepend(` <div class="col-md-5">
                                <div class="row mb-3">
                                    @error('education_level.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-4 col-form-label col-form-label-sm required" for="education_level[]">Izglītības
                        līmenis</label>
                    <div class="col-sm-8">
                        <select class="form-select form-select-sm" name="education_level[]"
                                id="education_level[]">
                            <option selected value="">---</option>
@foreach(\App\Models\Education::getEducationLevels() as $value=>$level)
                    <option value="{{$value}}">{{$level}}</option>
                                            @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
@error('education_status.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-4 col-form-label col-form-label-sm required" for="education_status[]">Studiju
                        statuss</label>
                    <div class="col-sm-8">
                        <select class="form-select form-select-sm" id="education_status[]"
                                name="education_status[]">
                            <option selected value="">---</option>
@foreach(\App\Models\Education::getEducationStatuses() as $value=>$status)
                    <option value="{{$value}}">{{$status}}</option>
                                            @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label col-form-label-sm" for="studies_started_at[]">Uzsāku: </label>
                <div class="col-sm-4">
                    <input class="form-control form-control-sm" type="date"
                           id="studies_started_at[]"
                           name="studies_started_at[]">
                </div>
                <label class="col-sm-2 col-form-label col-form-label-sm"
                       for="studies_finished_at[]">Pabeidzu: </label>
                <div class="col-sm-4">
                    <input class="form-control form-control-sm" type="date"
                           name="studies_finished_at[]"
                           id="studies_finished_at[]">
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <div class="row mb-3">
@error('university.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-4 col-form-label col-form-label-sm required" for="university[]">Izglītības
                        iestāde</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" id="university[]"
                               name="university[]"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label col-form-label-sm"
                           for="faculty[]">Fakultāte</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" id="faculty[]" name="faculty[]"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label col-form-label-sm" for="study_direction[]">Studiju
                        virziens</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" id="study_direction[]"
                               name="study_direction[]"/>
                    </div>
                </div>
            </div>`);
                })
            })
        </script>

        <!--script for job block-->

        <script>
            $(document).ready(function () {
                $(".add_job_button").click(function (e) {
                    e.preventDefault();
                    $("#job_block_id").prepend(`<div class="col-md-5">
                                <div class="row mb-3">
                                    @error('company.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                           for="company[]">Uzņēmums</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" type="text" name="company[]"
                               id="company[]">
                    </div>
                </div>
@error('position.*')
                    <small style="color: red">{{ $message }}</small>
                                @enderror
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm required"
                               for="position[]">Amats</label>
                        <div class="col-sm-8">
                            <input class="form-control form-control-sm" type="text" name="position[]"
                                   id="position[]">
                        </div>
                    </div>
                    <div class="row mb-3">
@error('workload.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-4 col-form-label col-form-label-sm required" for="workload[]">Slodzes
                        apmērs</label>
                    <div class="col-sm-8">
                        <select class="form-select form-select-sm" name="workload[]" id="workload[]">
                            <option selected value="">---</option>
@foreach(\App\Models\Job::getWorkLoads() as $value=>$load)
                    <option value="{{$value}}">{{$load}}</option>
                                            @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
@error('job_description.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-4 col-form-label col-form-label-sm required" for="job_description[]">Darba
                        apraksts</label>
                    <div class="col-sm-8">
                        <textarea class="form-control form-control-sm" name="job_description[]"
                                  id="job_description[]"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
@error('job_started_at.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-2 col-form-label col-form-label-sm required" for="job_started_at[]">No</label>
                    <div class="col-sm-4">
                        <input class="form-control form-control-sm" type="date" name="job_started_at[]"
                               id="job_started_at[]">
                    </div>
                    <label class="col-sm-2 col-form-label col-form-label-sm"
                           for="job_finished_at[]">līdz</label>
                    <div class="col-sm-4">
                        <input class="form-control form-control-sm" type="date" name="job_finished_at[]"
                               id="job_finished_at[]">
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
                </div>
            </div>`);
                })
            })
        </script>

        <!--script for bonus knowledge block-->
        <script>
            $(document).ready(function () {
                $(".add_bonus_knowledge").click(function (e) {
                    e.preventDefault();
                    $("#bonus_knowledge_id").prepend(`<div class="col-md-6">
                                <div class="row mb-3">
                                    @error('bonus_title.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                           for="bonus_title[]">Prasme</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" name="bonus_title[]"
                               id="bonus_title[]">
                    </div>
                </div>
                <div class="row mb-3">
@error('bonus_description.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                           for="bonus_description[]">Apraksts</label>
                    <div class="col-sm-8">
            <textarea class="form-control form-control-sm" name="bonus_description[]"
                      id="bonus_description[]"></textarea>
                    </div>
                </div>
            </div><div class="col-md-2"></div>`);
                })
            })
        </script>

        <!--script for language block-->
        <script>
            $(document).ready(function () {
                $(".add_language_button").click(function (e) {
                    e.preventDefault();
                    $("#language_block_id").prepend(`<div class="col-md-6">
                                <div class="row mb-3">
                                    @error('language.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-4 col-form-label col-form-label-sm required"
                           for="language[]">Valoda</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" name="language[]" id="language[]">
                    </div>
                </div>
                <div class="row mb-3">
@error('language_level.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-4 col-form-label col-form-label-sm required" for="language_level[]">Novērtē
                        zināšanu līmeni</label>
                    <div class="col-sm-8">
                        <select class="form-select form-select-sm" id="language_level[]"
                                name="language_level[]">
                            <option selected value="">---</option>
@foreach(\App\Models\Language::getLanguageSkillLevels() as $value=>$skillLevel)
                    <option value="{{$value}}">{{$skillLevel}}</option>
                                            @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div><div class="col-md-2"></div>`);
                })
            })
        </script>

        <!--script for social media block-->
        <script>
            $(document).ready(function () {
                $(".add_social_media_button").click(function (e) {
                    e.preventDefault();
                    $("#social_media_block_id").prepend(`                          <div class="col-md-10">
                                <div class="row mb-3">
                                    @error('social_media_icon.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-3 col-form-label col-form-label-sm required" for="social_media_icon[]">Izvēlies
                        soctīklu</label>
                    <div class="col-sm-2">
                        <select class="form-select form-select-sm" id="social_media_icon[]"
                                name="social_media_icon[]">
                            <option selected value="">---</option>
@foreach(\App\Models\Link::getSocialSites() as $value=>$site)
                    <option value="{{$value}}">{{$site}}</option>
                                            @endforeach
                    </select>
                </div>
@error('social_media_url.*')
                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                    <label class="col-sm-2 col-form-label col-form-label-sm required" for="social_media_url[]">Iekopē
                        saiti</label>
                    <div class="col-sm-5">
                        <input class="form-control form-control-sm" name="social_media_url[]"
                               id="social_media_url[]">
                    </div>
                </div>
            </div>`);
                })
            })
        </script>

@endsection
