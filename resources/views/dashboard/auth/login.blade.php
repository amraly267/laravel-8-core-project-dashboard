@extends(config('dashboard.resource_folder').'partials.layout')

@section('content')

    <span class="help-block error-help-block input-error credential-error" style="color: red;"></span>
    <br>

    <form action="#" method="post" novalidate>
        @csrf @method('post')

        <div class="input-group mb-12">
            <input type="email" class="form-control" placeholder="{{trans(config('dashboard.trans_file').'email')}}" name="email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <span class="help-block error-help-block input-error email-error" style="color: red;"></span>
        <br>

        <div class="input-group mb-12">
            <input type="password" class="form-control" placeholder="{{trans(config('dashboard.trans_file').'password')}}" name="password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <span class="help-block error-help-block input-error password-error" style="color: red;"></span>
        <br>

        <div class="row">
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">{{trans(config('dashboard.trans_file').'login')}}</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <p class="mb-1">
        <a href="#">{{trans(config('dashboard.trans_file').'forget_password')}}</a>
    </p>
@endsection
