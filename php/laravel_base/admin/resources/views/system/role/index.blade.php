@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li>{{ link_to_route('index_index', '首页') }}</li>
        <li>&GT;</li>
        <li class="active">角色列表</li>
    </ul>
    
    <section class="panel">
        <header class="panel-heading">
            <span class="label label-primary">角色列表</span>
            <span class="tools pull-right">
                {{ link_to_route('system_role_create', '添加角色', [], ['class' => 'label label-success']) }}
            </span>
        </header>
        @include('system.role._search', ['data' => $searchData])
        <table class="table table-striped table-advance table-hover">
            <thead>
                <tr>
                    <th class="col-sm-1">ID</th>
                    <th class="col-sm-2">角色名称</th>
                    <th class="col-sm-2">角色描述</th>
                    <th class="col-sm-2">用户数</th>
                    <th class="sol-sm-1">角色状态</th>
                    <th class="sol-sm-2">创建时间</th>
                    <th class="col-sm-2">操作</th>
                </tr>
            </thead>
            @if ($roles)
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>{{ link_to_route('system_user_index', $role->users->count(), ['role_id' => $role->id]) }}</td>
                    <td>{{ get_status('role', $role->status) }}</td>
                    <td>{{ $role->created_at }}</td>
                    <td>
                        {{ link_to_route('system_role_show', '查看', ['id' => $role->id]) }} |
                        {{ link_to_route('system_role_update', '修改', ['id' => $role->id]) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
        <div class="dataTables_paginate paging_bootstrap pagination">
            {{ $roles->appends($searchData)->render() }}
        </div>
    </section>
</div>
@endsection