<link href="{{asset('plugins/dashboard/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

@extends(config('dashboard.resource_folder').'partials.layout')

@section('content')

@section('page_path')
<!--begin::Title-->
<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans(config('dashboard.trans_file').'countries')}}</h1>
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
    <li class="breadcrumb-item text-dark">{{trans(config('dashboard.trans_file').'countries')}}</li>
    <!--end::Item-->
</ul>
<!--end::Breadcrumb-->
@endsection

<div class="col-xl-12">
    <!--begin::Tables Widget 9-->
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{trans(config('dashboard.trans_file').'countries')}}</span>
                <span class="text-muted mt-1 fw-bold fs-7">{{trans(config('dashboard.trans_file').'total_results', ['val' => $totalResults])}}</span>
            </h3>
            @if(auth()->guard('admin')->user()->can('country-create'))
            <div class="card-toolbar">
                <a href="{{route('countries.create')}}" class="btn btn-sm btn-light-primary">
                    <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-03-183419/theme/html/demo2/dist/../src/media/svg/icons/Navigation/Plus.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                    </span>
                    {{trans(config('dashboard.trans_file').'add_new')}}
                </a>
            </div>
            @endif
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_datatable_example_1" class="table table-row-bordered gy-5">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold fs-6 text-muted">
                            <th class="min-w-20px">#</th>
                            <th class="min-w-150px">{{trans(config('dashboard.trans_file').'name')}}</th>
                            <th class="min-w-150px">{{trans(config('dashboard.trans_file').'name_code')}}</th>
                            <th class="min-w-140px">{{trans(config('dashboard.trans_file').'phone_code')}}</th>
                            <th class="min-w-120px">{{trans(config('dashboard.trans_file').'status')}}</th>
                            @if(auth()->guard('admin')->user()->can('country-edit') || auth()->guard('admin')->user()->can('country-delete'))
                            <th class="min-w-100px">{{trans(config('dashboard.trans_file').'actions')}}</th>
                            @endif
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->

                    <!--end::Table body-->
                </table>
                {{-- {{$countries->links("pagination::bootstrap-4")}} --}}
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 9-->
</div>
@endsection

@push('footer-scripts')
    <script src="{{asset('plugins/dashboard/datatables/datatables.bundle.js')}}"></script>
    <script>
        var title = "{{trans(config('dashboard.trans_file').'delete_question')}}";

        function loadData()
        {
            $("#kt_datatable_example_1").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                stateSave: true,
                order: [[1, "desc"]],
                ajax: "{{route('countries.index')}}",
                columns:[{data: 'index'}, {data: 'name'}, {data: 'name_code'}, {data: 'phone_code'}, {data: 'status'}, {data: 'action'}],
                dom: 'Bfrtip',
                language: {url: @if(config('app.locale') === 'en') "//cdn.datatables.net/plug-ins/1.10.16/i18n/English.json" @else "//cdn.datatables.net/plug-ins/1.10.16/i18n/Arabic.json" @endif},
                lengthMenu: [[10, 25, 50, 100, 500],['10', '25', '50', '100', '500']],
                columnDefs: [
                    {targets: 0, orderable: false, searchable: false, render: function (data, type, full, meta) {return data;}},
                    {targets: -1, orderable: false, searchable: false, render: function (data, type, full, meta) {
                        @if(auth()->guard('admin')->user()->can('country-delete'))
                            return '<a href="'+baseUrl+'/countries/'+data+'/edit'+'">editUrl</a>'
                        @endif
                    }},
                ],
                buttons: [
                    {extend: "pageLength", className: "btn blue btn-outline", text: "Page Lenght", exportOptions: {stripHtml: true, columns: ':visible'}},
                    {extend: "print", className: "btn blue btn-outline", text: "Print", exportOptions: {stripHtml: true, columns: ':visible'}},
                    {extend: "pdf", className: "btn blue btn-outline", text: "PDF", exportOptions: {stripHtml: true, columns: ':visible'}},
                    {extend: "excel", className: "btn blue btn-outline", text: "Excel", exportOptions: {stripHtml: true, columns: ':visible'}},
                    {extend: "colvis", className: "btn blue btn-outline", text: "Colvis", exportOptions: {stripHtml: true, columns: ':visible'}},
                ],
            });
        }
        $( document ).ready(function(){
            loadData();
        })
    </script>
@endpush
