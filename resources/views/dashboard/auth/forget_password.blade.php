@extends(config('dashboard.resource_folder').'partials.layout')

@section('content')
    <form action="#" method="post" novalidate>
        @csrf @method('post')

        <div class="input-group mb-12">
            <input type="email" class="form-control" placeholder="{{trans('email')}}" name="email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <span class="help-block error-help-block input-error email-error" style="color: red;"></span>
        <br>

        <div class="row">
            <!-- /.col -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">{{trans('send_password_reset_link')}}</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection
