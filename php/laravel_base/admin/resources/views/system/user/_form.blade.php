<div class="form-group">
    <label class="col-sm-1 control-label">用户昵称</label>
    <div class="col-sm-11">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-1 control-label">登陆邮箱</label>
    <div class="col-sm-11">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-1 control-label">登陆密码</label>
    <div class="col-sm-11">
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-1 control-label">确认密码</label>
    <div class="col-sm-11">
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-1 control-label">选择角色</label>
    <div class="col-sm-11">
        {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::submit('保存', ['class' => 'btn btn-block btn-primary']) !!}
</div>