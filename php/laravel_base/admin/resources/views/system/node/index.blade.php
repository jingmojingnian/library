@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li>{{ link_to_route('index_index', '首页') }}</li>
        <li>&GT;</li>
        @if ($id)
        <li>{{ link_to_route('system_node_index', '节点列表') }}</li>
        <li>&GT;</li>
        <li class="active">子节点</li>
        @else
        <li class="active">节点列表</li>
        @endif
    </ul>
    
    <section class="panel">
        <header class="panel-heading">
            <span class="label label-primary">节点列表</span>
            <span class="tools pull-right">{{ link_to_route('system_node_sync', '更新节点', [], ['class' => 'label label-success']) }}</span>
        </header>
        <table class="table table-striped table-advance table-hover">
            <thead>
                <tr>
                    <th class="col-sm-1">ID</th>
                    <th class="col-sm-2">节点名称</th>
                    <th class="col-sm-3">节点路径</th>
                    @if ($id)
                    <th class="sol-sm-2">上级节点</th>
                    @endif
                    <th class="sol-sm-2">创建时间</th>
                    <th class="col-sm-2">操作</th>
                </tr>
            </thead>
            @if ($nodes)
            <tbody>
                @foreach ($nodes as $node)
                <tr>
                    <td>{{ $node->id }}</td>
                    <td>{{ $node->name }}</td>
                    <td>{{ $node->path }}</td>
                    @if ($id)
                    <td>{{ $node->pid }}</td>
                    @endif
                    <td>{{ $node->created_at }}</td>
                    <td>
                        {{ link_to_route('system_node_update', '修改节点', ['id' => $node->id]) }}
                        @if (!$id) 
                        | {{ link_to_route('system_node_index', '子节点', ['id' => $node->id]) }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
        <div class="dataTables_paginate paging_bootstrap pagination">
            {{ $nodes->render() }}
        </div>
    </section>
</div>
@endsection