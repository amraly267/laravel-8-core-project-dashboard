<div class="card col-2 mb-5 mb-xl-10 form-side-menu d-flex" style="height: auto">
    <div class="mt-5 mb-5">
        <div class="accordion" id="accordionExample">
            <button class="active btn btn-light btn-active-light-primary w-100 accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                {{trans('setting::dashboard.general_settings')}}
            </button>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="panel-body">
                    <ul class="accordion-tab nav nav-tabs">
                        <li>
                            <a class="active btn w-100" href="#logo" data-toggle="tab">{{trans('setting::dashboard.logo')}}</a>
                        </li>
                        <li>
                            <a class="btn w-100" href="#appearance" data-toggle="tab">{{trans('setting::dashboard.appearance')}}</a>
                        </li>
                        <li>
                            <a class="btn w-100" href="#mail_configuration" data-toggle="tab">{{trans('setting::dashboard.mail_configuration')}}</a>
                        </li>
                        <li>
                            <a class="btn w-100" href="#contacts_info" data-toggle="tab">{{trans('setting::dashboard.contacts_info')}}</a>
                        </li>
                        <li>
                            <a class="btn w-100" href="#social_media" data-toggle="tab">{{trans('setting::dashboard.social_media')}}</a>
                        </li>
                        <li>
                            <a class="btn w-100" href="#custome_css_js" data-toggle="tab">{{trans('setting::dashboard.custome_css_js')}}</a>
                        </li>
                        <li>
                            <a class="btn w-100" href="#countries_languages" data-toggle="tab">{{trans('setting::dashboard.countries_languages')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
