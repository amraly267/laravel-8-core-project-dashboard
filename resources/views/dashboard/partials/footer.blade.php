
<script src="{{asset('plugins/dashboard/global/plugins.bundle.js')}}"></script>
<script src="{{asset('js/dashboard/scripts.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('js/dashboard/formToJson.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!--end::Global Javascript Bundle-->
<script>
    var baseUrl = "{{URL::to('/')}}/admin";
</script>
@stack('footer-scripts')
<script type="text/javascript" src="{{asset('js/dashboard/custome.js')}}"></script>
