<div class="well">
    {!! Form::open(['route' => ['system_user_index'], 'class' => 'form-horizontal tasi-form', 'method' => 'get']) !!}
    <div class="form-group">
        <label class="col-sm-1 control-label">用户昵称</label>
        <div class="col-sm-2">
            {!! Form::text('name', $data['name'], ['class' => 'form-control']) !!}
        </div>
        <label class="col-sm-1 control-label">登陆邮箱</label>
        <div class="col-sm-2">
            {!! Form::text('email', $data['email'], ['class' => 'form-control']) !!}
        </div>
        <label class="col-sm-1 control-label">选择角色</label>
        <div class="col-sm-2">
            {!! Form::select('role_id', $roles, $data['role_id'], ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('搜索', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>