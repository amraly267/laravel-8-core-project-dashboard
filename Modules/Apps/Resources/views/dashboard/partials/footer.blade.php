
<script src="{{url('plugins/dashboard/global/plugins.bundle.js')}}"></script>
<script src="{{url('js/dashboard/scripts.bundle.js')}}"></script>
<script type="text/javascript" src="{{url('js/dashboard/formToJson.min.js')}}"></script>
<script src="{{url('js/dashboard/bootstrap.bundle.min.js')}}"></script>

<!--end::Global Javascript Bundle-->
<script>
    var baseUrl = "{{URL::to('/')}}/admin";
</script>
@stack('footer-scripts')
<script type="text/javascript" src="{{url('js/dashboard/custome.js')}}"></script>
