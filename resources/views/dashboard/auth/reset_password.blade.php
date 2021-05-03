@extends(config('dashboard.resource_folder').'partials.layout')

@section('content')
    <form action="#" method="post">
        @csrf @method('post')

        <input type="hidden" name="email" value="{{request()->email}}"/>
        <input type="hidden" name="token" value="{{request()->token}}"/>

        <div class="input-group mb-12">
            <input type="password" class="form-control" placeholder="{{trans('password')}}" name="password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <span class="help-block error-help-block input-error password-error" style="color: red;"></span>
        <br>

        <div class="input-group mb-12">
            <input type="password" class="form-control" placeholder="{{trans('confirm_password')}}" name="confirm_password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <span class="help-block error-help-block input-error confirm_password-error" style="color: red;"></span>
        <br>

        <div class="row">
            <!-- /.col -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">
                    {{trans('save')}}
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                </button>
            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection
