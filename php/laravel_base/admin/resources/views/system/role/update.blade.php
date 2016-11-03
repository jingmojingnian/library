@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li>{{ link_to_route('index_index', '首页') }}</li>
        <li>&GT;</li>
        <li>{{ link_to_route('system_role_index', '角色列表') }}</li>
        <li>&GT;</li>
        <li class="active">修改角色</li>
    </ul>

    <section class="panel">
        <section class="panel">
            <div class="panel-body">
                {!! Form::model($role, ['route' => ['system_role_storeupdate', 'id' => $role->id], 'class' => 'form-horizontal tasi-form', 'method' => 'put']) !!}
                @include('system.role._form', ['nodes' => $nodes, 'actions' => $actions])
                {!! Form::close() !!}
                @include('errors._form')
            </div>
        </section>
    </section>
</div>
@endsection