<div class="card col-2 mb-5 mb-xl-10 form-side-menu" style="height: auto">
    <div class="mt-5 mb-5">
        <div class="accordion" id="accordionExample">
            <button class="active btn btn-light btn-active-light-primary w-100 accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                {{trans(config('dashboard.trans_file').'general_settings')}}
            </button>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="panel-body">
                    <ul class="accordion-tab nav nav-tabs">
                        <li>
                            <a class="active btn w-100" href="#appearance" data-toggle="tab">{{trans(config('dashboard.trans_file').'appearance')}}</a>
                        </li>
                        <li>
                            <a class="btn w-100" href="#social_media" data-toggle="tab">{{trans(config('dashboard.trans_file').'social_media')}}</a>
                        </li>
                        <li>
                            <a class="btn w-100" href="#custome_css_js" data-toggle="tab">{{trans(config('dashboard.trans_file').'custome_css_js')}}</a>
                        </li>
                        <li>
                            <a class="btn w-100" href="#countries_languages" data-toggle="tab">{{trans(config('dashboard.trans_file').'countries_languages')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
