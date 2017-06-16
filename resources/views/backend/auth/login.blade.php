@extends('backend.layouts.app')


@section('content')
<h1>后台登录</h1>

<div>
    <form class="form-horizontal col-sm-offset-2 col-sm-10" action="{{route('auth.login')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="username" name="username" value="{{old('username')}}" class="form-control" style="width: 300px;" id="username" placeholder="用户名">
                <span class="text-danger">{{isset($errors->default->keys()['0']) && $errors->default->keys()['0'] == 'username' ? $errors->first() : ''}}</span>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label" >密码</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" value="{{old('password')}}" style="width: 300px;" id="password" placeholder="密码">
                <p class="text-danger">{{ isset($errors->default->keys()['0']) && $errors->default->keys()['0'] == 'password' ? $errors->first() : ''}}</p>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" value="1" {{empty(old('remember')) ? '' : "checked='checked'"}}/> 记住我
                    </label>
                    <label>
                        <a href="#" target="_blank">忘记密码</a>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <label><button type="submit" class="btn btn-default">登 录</button></label>
                <label>错误信息显示</label>
            </div>
        </div>
    </form>
</div>
@endsection
