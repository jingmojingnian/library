@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li>{{ link_to_route('index_index', '首页') }}</li>
        <li>&GT;</li>
        <li>{{ link_to_route('system_user_index', '管理员列表') }}</li>
        <li>&GT;</li>
        <li class="active">查看详情</li>
    </ul>

    <section class="panel">
        <section class="panel">
            <div class="panel-body">
                <ul class="p-info">
                    <li>
                        <div class="col-sm-2">ID</div>
                        <div class="sol-sm-10">{{ $user->id }}</div>
                    </li>
                    <li>
                        <div class="col-sm-2">用户昵称</div>
                        <div class="sol-sm-10">{{ $user->name }}</div>
                    </li>
                    <li>
                        <div class="col-sm-2">登陆邮箱</div>
                        <div class="sol-sm-10">{{ $user->email }}</div>
                    </li>
                    <li>
                        <div class="col-sm-2">所属角色</div>
                        <div class="sol-sm-10">{{ $user->role_id ? $user->role->name : '-' }}</div>
                    </li>
                    <li>
                        <div class="col-sm-2">注册时间</div>
                        <div class="sol-sm-10">{{ $user->created_at }}</div>
                    </li>
                    <li>
                        <div class="col-sm-2">修改时间</div>
                        <div class="sol-sm-10">{{ $user->updated_at }}</div>
                    </li>
                </ul>
            </div>
        </section>
    </section>
</div>
@endsection