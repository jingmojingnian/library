@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li>{{ link_to_route('index_index', '首页') }}</li>
        <li>&GT;</li>
        <li>{{ link_to_route('system_role_index', '角色列表') }}</li>
        <li>&GT;</li>
        <li class="active">添加角色</li>
    </ul>

    <section class="panel">
        <section class="panel">
            <div class="panel-body">
                {!! Form::open(['route' => ['system_role_storecreate'], 'class' => 'form-horizontal tasi-form', 'method' => 'post']) !!}
                @include('system.role._form', ['nodes' => $nodes])
                {!! Form::close() !!}
                @include('errors._form')
            </div>
        </section>
    </section>
</div>
@endsection