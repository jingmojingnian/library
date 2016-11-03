@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li>{{ link_to_route('index_index', '首页') }}</li>
        <li>&GT;</li>
        <li>{{ link_to_route('system_role_index', '角色列表') }}</li>
        <li>&GT;</li>
        <li class="active">查看详情</li>
    </ul>

    <section class="panel">
        <section class="panel">
            <div class="panel-body">
                <ul class="p-info">
                    <li>
                        <div class="col-sm-2">ID</div>
                        <div class="sol-sm-10">{{ $role->id }}</div>
                    </li>
                    <li>
                        <div class="col-sm-2">名称</div>
                        <div class="sol-sm-10">{{ $role->name }}</div>
                    </li>
                    <li>
                        <div class="col-sm-2">描述</div>
                        <div class="sol-sm-10">{{ $role->description }}</div>
                    </li>
                    <li>
                        <div class="col-sm-2">权限</div>
                        <div class="sol-sm-10">
                            @if ($actions)
                            <div class="btn-group">
                                @foreach ($actions as $route => $action)
                                <button type="button" class="btn btn-default">{{ $action }}</button>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </li>
                    <li>
                        <div class="col-sm-2">状态</div>
                        <div class="sol-sm-10">{{ get_status('role', $role->status) }}</div>
                    </li>
                    <li>
                        <div class="col-sm-2">注册时间</div>
                        <div class="sol-sm-10">{{ $role->created_at }}</div>
                    </li>
                    <li>
                        <div class="col-sm-2">修改时间</div>
                        <div class="sol-sm-10">{{ $role->updated_at }}</div>
                    </li>
                </ul>
            </div>
        </section>
    </section>
</div>
@endsection