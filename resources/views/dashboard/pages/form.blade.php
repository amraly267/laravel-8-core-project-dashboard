@extends(config('dashboard.resource_folder').'partials.layout')
@section('content')

@section('page_path')
<!--begin::Title-->
<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans(config('dashboard.trans_file').'static_pages')}}</h1>
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
    <li class="breadcrumb-item text-muted">
        <a href="{{route('pages.index')}}" class="text-muted text-hover-primary">{{trans(config('dashboard.trans_file').'static_pages')}}</a>
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
        <form action="{{$submitFormRoute}}" method="POST" id="pageForm" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
            @csrf @method($submitFormMethod)
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'title_en')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-4 fv-row fv-plugins-icon-container">
                        <input type="text" name="title[en]" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'title_en')}}" value="{{$submitFormMethod == 'put' ? $page->getTranslation('title', 'en') : old('title_en')}}">
                        <span class="help-block error-help-block input-error title-en-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->

                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'title_ar')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-4 fv-row fv-plugins-icon-container">
                        <input type="text" name="title[ar]" class="form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'title_ar')}}" value="{{$submitFormMethod == 'put' ? $page->getTranslation('title', 'ar') : old('title_ar')}}">
                        <span class="help-block error-help-block input-error title-ar-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-12 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'description_en')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                        <textarea name="description[en]" class="description form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'description_en')}}" rows="8">{{$submitFormMethod == 'put' ? $page->getTranslation('description', 'en') : old('description_en')}}</textarea>
                        <span class="help-block error-help-block input-error description-en-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-12 col-form-label fw-bold fs-6">{{trans(config('dashboard.trans_file').'description_ar')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                        <textarea name="description[ar]" class="description form-control form-control-lg form-control-solid" placeholder="{{trans(config('dashboard.trans_file').'description_ar')}}" rows="8">{{$submitFormMethod == 'put' ? $page->getTranslation('description', 'ar') : old('description_en')}}</textarea>
                        <span class="help-block error-help-block input-error description-ar-error" style="color: red;"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <label class="form-check-label col-lg-2 col-form-label fw-bold fs-6" for="flexSwitchDefault">
                            {{trans(config('dashboard.trans_file').'status')}}
                        </label>
                        <input class="form-check-input" {{$submitFormMethod == 'put' && $page->status == 0 ? '' : 'checked'}} type="checkbox" name="status" value="1" id="flexSwitchDefault"/>
                    </div>
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

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
        setTimeout(function(){
            CKEDITOR.replaceAll('description',{
                contentsLangDirection: "{{ config('app.locale') == 'en'? 'ltr': 'rtl'}}",
            });
        },400);

        // === save changes ===
        $('#saveBtn').on('click', function(){

            function beforeSend()
            {
                $('.input-error').hide();
                $('#saveBtn .spinner-border').removeClass('d-none');
                $('#pageForm *').prop('disabled', true);
            }
            function afterComplete()
            {
                $('#saveBtn .spinner-border').addClass('d-none');
                $('#pageForm *').prop('disabled', false);
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
            submitForm($('#pageForm')[0], beforeSend, afterComplete, successResponse, errorResponse, ['description[en]', 'description[ar]'])
        })
        // === End script ===
    </script>
@endpush
