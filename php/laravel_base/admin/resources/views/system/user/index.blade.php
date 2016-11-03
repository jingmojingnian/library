@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li>{{ link_to_route('index_index', '首页') }}</li>
        <li>&GT;</li>
        <li class="active">管理员列表</li>
    </ul>

    <section class="panel">
        <header class="panel-heading">
            <span class="label label-primary">管理员列表</span>
            <span class="tools pull-right">{{ link_to_route('system_user_create', '添加管理员', [], ['class' => 'label label-success']) }}</span>
        </header>
        @include('system.user._search', ['data' => $searchData])
        <table class="table table-striped table-advance table-hover">
            <thead>
                <tr>
                    <th class="col-sm-2">ID</th>
                    <th class="col-sm-2">昵称</th>
                    <th class="col-sm-2">邮箱</th>
                    <th class="sol-sm-2">所属角色</th>
                    <th class="sol-sm-2">创建时间</th>
                    <th class="col-sm-2">操作</th>
                </tr>
            </thead>
            <tbody>
                @if ($users)
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_id ? link_to_route('system_role_show', $user->role->name, ['id' => $user->role_id]) : '-' }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        {{ link_to_route('system_user_show', '查看', ['id' => $user->id]) }} |
                        {{ link_to_route('system_user_update', '编辑', ['id' => $user->id]) }}
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="dataTables_paginate paging_bootstrap pagination">
            {{ $users->appends($searchData)->render() }}
        </div>
    </section>
</div>
@endsection