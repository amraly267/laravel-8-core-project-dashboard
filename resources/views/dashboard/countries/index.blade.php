<link href="{{asset('plugins/dashboard/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />


<style>
    .dataTables_filter {
        display: none;
    }
</style>

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

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-delivery-package text-primary"></i>
            </span>
            <span class="menu-icon">
                <!--begin::Svg Icon | path: assets/media/icons/duotone/Communication/Flag.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <path d="M3.5,3 L5,3 L5,19.5 C5,20.3284271 4.32842712,21 3.5,21 L3.5,21 C2.67157288,21 2,20.3284271 2,19.5 L2,4.5 C2,3.67157288 2.67157288,3 3.5,3 Z" fill="#000000"/>
                    <path d="M6.99987583,2.99995344 L19.754647,2.99999303 C20.3069317,2.99999474 20.7546456,3.44771138 20.7546439,3.99999613 C20.7546431,4.24703684 20.6631995,4.48533385 20.497938,4.66895776 L17.5,8 L20.4979317,11.3310353 C20.8673908,11.7415453 20.8341123,12.3738351 20.4236023,12.7432941 C20.2399776,12.9085564 20.0016794,13 19.7546376,13 L6.99987583,13 L6.99987583,2.99995344 Z" fill="#000000" opacity="0.3"/>
                </svg></span>
                <!--end::Svg Icon-->
            </span>
            <h3 class="card-label">{{trans(config('dashboard.trans_file').'countries')}}</h3>
            <span class="text-muted mt-1 fw-bold fs-7">{{trans(config('dashboard.trans_file').'total_results', ['val' => $totalResults])}}</span>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
                <a href="#" style="margin-right: 10px;" type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Export</a>
                <!--begin::Dropdown Menu-->
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Navigation-->
                    <ul class="navi flex-column navi-hover py-2">
                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-print"></i>
                                </span>
                                <span class="navi-text">Print</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-copy"></i>
                                </span>
                                <span class="navi-text">Copy</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-file-excel-o"></i>
                                </span>
                                <span class="navi-text">Excel</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-file-text-o"></i>
                                </span>
                                <span class="navi-text">CSV</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-file-pdf-o"></i>
                                </span>
                                <span class="navi-text">PDF</span>
                            </a>
                        </li>
                    </ul>
                    <!--end::Navigation-->
                </div>
                <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->
            <!--begin::Button-->
            @if(auth()->guard('admin')->user()->can('country-create'))
            <a href="{{route('countries.create')}}" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>{{trans(config('dashboard.trans_file').'add_new')}}</a>
            @endif
            <!--end::Button-->
        </div>
    </div>
</div>

<div class="col-xl-12">
    <!--begin::Tables Widget 9-->
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Body-->
        <div class="card-body py-3">

            <form class="mb-15" action="{{route('countries.index')}}" method="GET">
                <div class="row mb-6">
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>{{trans(config('dashboard.trans_file').'name')}}</label>
                        <input type="text" name="name" class="form-control datatable-input" placeholder="{{trans(config('dashboard.trans_file').'name')}}" data-col-index="0">
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>{{trans(config('dashboard.trans_file').'name_code')}}</label>
                        <input type="text" name="name_code" class="form-control datatable-input" placeholder="{{trans(config('dashboard.trans_file').'name_code')}}" data-col-index="1">
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>{{trans(config('dashboard.trans_file').'phone_code')}}</label>
                        <input type="text" name="phone_code" class="form-control datatable-input" name="" placeholder="{{trans(config('dashboard.trans_file').'phone_code')}}" data-col-index="4">
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>{{trans(config('dashboard.trans_file').'status')}}</label>
                        <select name="status" class="form-control datatable-input" data-col-index="2">
                            <option value="">{{trans(config('dashboard.trans_file').'all')}}</option>
                            <option value="1">{{trans(config('dashboard.trans_file').'active')}}</option>
                            <option value="0">{{trans(config('dashboard.trans_file').'deactivate')}}</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-8">
                    <div class="col-lg-12">
                        <button class="btn btn-primary btn-primary--icon" id="kt_search">
                            <span>
                                <i class="la la-search"></i>
                                <span>{{trans(config('dashboard.trans_file').'search')}}</span>
                            </span>
                        </button>
                        <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                </div>
                </div>
            </form>

            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_datatable_example_1" class="table table-bordered table-hover table-checkable dataTable dtr-inline">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold fs-6 text-muted">
                            <th class="min-w-20px" data-column-name="index">#</th>
                            <th class="min-w-150px" data-column-name="name">{{trans(config('dashboard.trans_file').'name')}}</th>
                            <th class="min-w-100px" data-column-name="name_code">{{trans(config('dashboard.trans_file').'name_code')}}</th>
                            <th class="min-w-100px" data-column-name="phone_code">{{trans(config('dashboard.trans_file').'phone_code')}}</th>
                            <th class="min-w-100px" data-column-name="status">{{trans(config('dashboard.trans_file').'status')}}</th>
                            @if(auth()->guard('admin')->user()->can('country-edit') || auth()->guard('admin')->user()->can('country-delete'))
                            <th class="min-w-150px" data-column-name="operation">{{trans(config('dashboard.trans_file').'actions')}}</th>
                            @endif
                        </tr>
                    </thead>
                    <!--end::Table head-->
                </table>
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
            var dataTable = $("#kt_datatable_example_1").DataTable({
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

                            var editRoute = '{{ route("countries.edit", ":id") }}'.replace(':id', data);
                            var deleteRoute = '{{ route("countries.destroy", ":id") }}'.replace(':id', data);
                            var csrfToken = "{{csrf_token()}}";

                            var editUrl = '<a href="'+editRoute+'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">';
                            editUrl += '<span class="svg-icon svg-icon-3">';
                            editUrl += '<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">';
                            editUrl += '<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>';
                            editUrl += '<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>';
                            editUrl += '</svg></span></a>';

                            var deleteUrl = "<a href='#' onclick=deleteRow('"+deleteRoute+"','"+csrfToken+"') class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm'>";
                            deleteUrl += '<span class="svg-icon svg-icon-3">';
                            deleteUrl += '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">';
                            deleteUrl += '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">';
                            deleteUrl += '<rect x="0" y="0" width="24" height="24"></rect>';
                            deleteUrl += '<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>';
                            deleteUrl += '<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>';
                            deleteUrl += '</svg></span></a>';

                            return editUrl+deleteUrl;
                        @endif
                    }},
                ],
                buttons: [
                    {extend: 'collection',
            text: 'Export',
            className:"btn btn-light-primary font-weight-bolder dropdown-toggle",
            fade: true,
            buttons:[
                    {extend: "pageLength", className: 'btn btn-default btn-sm-menu', text: "{{trans(config('dashboard.trans_file').'page_length')}}", exportOptions: {stripHtml: true, columns: ':visible'}},
                    {extend: "print", className: 'btn btn-default btn-sm-menu', text: "{{trans(config('dashboard.trans_file').'print')}}", exportOptions: {stripHtml: true, columns: ':visible'}},
                    {
                        text: "{{trans(config('dashboard.trans_file').'pdf')}}",
                        className: 'btn btn-default btn-sm-menu',
                        action: function()
                        {
                            var colsNames = [];
                            var colsIndexName = [];
                            for(var i=0; i< $('#kt_datatable_example_1 > thead > tr > th').length; i++)
                            {
                                var currentColumn = $('#kt_datatable_example_1 > thead > tr > th')[i];
                                colsNames.push($(currentColumn).text());
                                colsIndexName.push($(currentColumn).data('column-name'));
                            }
                            colsIndexName.push('ajax_request');

                            $.ajax({
                                type: 'GET',
                                url: "{{route('download-pdf')}}?"+$.param($('#kt_datatable_example_1').DataTable().ajax.params()),
                                contentType: "application/json",
                                dataType: "json",
                                data: {'visibleColsNames': colsNames, 'colsIndexName': colsIndexName},

                                complete: function (res) {

                                    var path = res.responseJSON.path;
                                    var link = document.createElement('a');
                                    link.href = path;
                                    link.download = 'download.pdf';
                                    link.target = '_blank';
                                    link.click();
                                }
                            })
                        }
                    },
                    {extend: "excel", className: 'btn btn-default btn-sm-menu', text: "{{trans(config('dashboard.trans_file').'excel')}}", exportOptions: {stripHtml: true, columns: ':visible'}},
                    {extend: "colvis", className: 'btn btn-default btn-sm-menu', text: "{{trans(config('dashboard.trans_file').'columns')}}", exportOptions: {stripHtml: true, columns: ':visible'}},
                ]}],
            });
        }
        $( document ).ready(function(){
            loadData();
        })
    </script>
@endpush
