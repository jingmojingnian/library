<div class="well">
    {!! Form::open(['route' => ['system_role_index'], 'class' => 'form-horizontal tasi-form', 'method' => 'get']) !!}
    <div class="form-group">
        <label class="col-sm-1 control-label">角色名称</label>
        <div class="col-sm-2">
            {!! Form::text('name', $data['name'], ['class' => 'form-control']) !!}
        </div>
        <label class="col-sm-1 control-label">角色状态</label>
        <div class="col-sm-2">
            {!! Form::select('status', ['请选择', '启用', -1 => '禁用'], $data['status'], ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('搜索', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>