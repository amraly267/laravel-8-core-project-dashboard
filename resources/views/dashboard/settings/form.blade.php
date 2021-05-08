@extends(config('dashboard.resource_folder').'partials.layout')
@section('content')

@section('page_path')
<!--begin::Title-->
<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans(config('dashboard.trans_file').'settings')}}</h1>
<!--end::Title-->
<!--begin::Separator-->
<span class="h-20px border-gray-200 border-start mx-4"></span>
<!--end::Separator-->
<!--begin::Breadcrumb-->
<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted">
        <a href="{{route('admin-home')}}" class="text-muted text-hover-primary">{{trans(config('dashboard.trans_file').'home')}}</a>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-dark">{{$pageTitle}}</li>
    <!--end::Item-->
</ul>
<!--end::Breadcrumb-->
@endsection

<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{$pageTitle}}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->

    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form action="{{$submitFormRoute}}" method="POST" id="countryForm" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
            @csrf @method($submitFormMethod)
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'logo')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('img/dashboard/default-image.svg')}})">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{$submitFormMethod == 'put' ? $settings->logo_path : asset('img/dashboard/default-image.svg')}})"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="{{trans(config('dashboard.trans_file').'change_image')}}">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="logo" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="logo_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="{{trans(config('dashboard.trans_file').'cancel')}}">
                            <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="{{trans(config('dashboard.trans_file').'remove_image')}}">
                            <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <br>
                        <span class="help-block error-help-block input-error logo-error" style="color: red;"></span>
                        <!--end::Image input-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'project_name_en')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-4 fv-row fv-plugins-icon-container">
                        <input type="text" name="project_name[en]" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'project_name_en')}}" value="{{$submitFormMethod == 'put' ? $settings->getTranslation('project_name', 'en') : old('project_name_en')}}">
                        <span class="help-block error-help-block input-error project_name-en-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->

                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'project_name_ar')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-4 fv-row fv-plugins-icon-container">
                        <input type="text" name="project_name[ar]" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'project_name_ar')}}" value="{{$submitFormMethod == 'put' ? $settings->getTranslation('project_name', 'ar') : old('project_name_ar')}}">
                        <span class="help-block error-help-block input-error project_name-ar-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'contact_us_email')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-4 fv-row fv-plugins-icon-container">
                        <input type="email" name="contact_us_email" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'contact_us_email')}}" value="{{$submitFormMethod == 'put' ? $settings->contact_us_email : old('contact_us_email')}}">
                        <span class="help-block error-help-block input-error contact_us_email-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->

                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'contact_us_mobile')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-4 fv-row fv-plugins-icon-container">
                        <input type="tel" minlength="9" maxlength="12" name="contact_us_mobile" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'contact_us_mobile')}}" value="{{$submitFormMethod == 'put' ? $settings->contact_us_mobile : old('contact_us_mobile')}}">
                        <span class="help-block error-help-block input-error contact_us_mobile-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'facebook_url')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row fv-plugins-icon-container">
                        <input type="url" name="facebook_url" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'facebook_url')}}" value="{{$submitFormMethod == 'put' ? $settings->facebook_url : old('facebook_url')}}">
                        <span class="help-block error-help-block input-error facebook_url-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'twitter_url')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row fv-plugins-icon-container">
                        <input type="url" name="twitter_url" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'twitter_url')}}" value="{{$submitFormMethod == 'put' ? $settings->twitter_url : old('twitter_url')}}">
                        <span class="help-block error-help-block input-error twitter_url-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'youtube_url')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row fv-plugins-icon-container">
                        <input type="url" name="youtube_url" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'youtube_url')}}" value="{{$submitFormMethod == 'put' ? $settings->youtube_url : old('youtube_url')}}">
                        <span class="help-block error-help-block input-error youtube_url-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'instagram_url')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row fv-plugins-icon-container">
                        <input type="url" name="instagram_url" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'instagram_url')}}" value="{{$submitFormMethod == 'put' ? $settings->instagram_url : old('instagram_url')}}">
                        <span class="help-block error-help-block input-error instagram_url-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'snapchat_url')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row fv-plugins-icon-container">
                        <input type="url" name="snapchat_url" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'snapchat_url')}}" value="{{$submitFormMethod == 'put' ? $settings->snapchat_url : old('snapchat_url')}}">
                        <span class="help-block error-help-block input-error snapchat_url-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'whatsapp_number')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row fv-plugins-icon-container">
                        <input type="tel" minlength="9" maxlength="12" name="whatsapp_number" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'whatsapp_number')}}" value="{{$submitFormMethod == 'put' ? $settings->whatsapp_number : old('whatsapp_number')}}">
                        <span class="help-block error-help-block input-error whatsapp_number-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->







            </div>
            <!--end::Card body-->



            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-white btn-active-light-primary me-2" onclick="window.location.reload()">{{trans(config('dashboard.trans_file').'cancel')}}</button>
                <button type="submit" class="btn btn-primary" id="saveBtn">
                    <span class="spinner-border spinner-border-sm align-middle ms-2 d-none"></span>
                    {{trans(config('dashboard.trans_file').'save')}}
                </button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
@endsection

@push('footer-scripts')
    <script>
        // === save changes ===
        $('#saveBtn').on('click', function(){

            function beforeSend()
            {
                $('.input-error').hide();
                $('#saveBtn .spinner-border').removeClass('d-none');
                $('#countryForm *').prop('disabled', true);
            }
            function afterComplete()
            {
                $('#saveBtn .spinner-border').addClass('d-none');
                $('#countryForm *').prop('disabled', false);
            }
            function successResponse()
            {
                Swal.fire({
                    icon: 'success',
                    title: callResponse.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
            }
            function errorResponse()
            {
                $.each(callResponse.responseJSON.errors, function(index, value) {
                    index = index.replace(".", "-");
                    if($('.'+index+'-error').length)
                    {
                        $('.'+index+'-error').show();
                        $('.'+index+'-error').text(value);
                    }
                });
            }
            submitForm($('#countryForm')[0], beforeSend, afterComplete, successResponse, errorResponse)
        })
        // === End script ===
    </script>
@endpush
