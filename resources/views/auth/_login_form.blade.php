<form role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
        <input type="text" class="form-control" placeholder="اسم المستخدم" name="username" value="{{ old('username') }}" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input type="password" class="form-control" name="password" placeholder="كلمه السر">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                </span>
        @endif
    </div>
    <div class="hidden">
        <input type="checkbox" name="remember" checked>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary  btn-flat">تسجيل دخول</button>
    </div>
</form>