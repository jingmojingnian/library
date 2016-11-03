@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li>{{ link_to_route('index_index', '首页') }}</li>
        <li>&GT;</li>
        <li>{{ link_to_route('system_user_index', '管理员列表') }}</li>
        <li>&GT;</li>
        <li class="active">添加管理员</li>
    </ul>

    <section class="panel">
        <section class="panel">
            <div class="panel-body">
                {!! Form::open(['route' => ['system_user_storecreate'], 'class' => 'form-horizontal tasi-form', 'method' => 'post']) !!}
                @include('system.user._form', ['roles' => $roles])
                {!! Form::close() !!}
                @include('errors._form')
            </div>
        </section>
    </section>
</div>
@endsection