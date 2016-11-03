@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li>{{ link_to_route('index_index', '首页') }}</li>
        <li>&GT;</li>
        <li>{{ link_to_route('system_user_index', '管理员列表') }}</li>
        <li>&GT;</li>
        <li class="active">修改管理员</li>
    </ul>

    <section class="panel">
        <section class="panel">
            <div class="panel-body">
                {!! Form::model($user, ['route' => ['system_user_storeupdate', 'id' => $user->id], 'class' => 'form-horizontal tasi-form', 'method' => 'put']) !!}
                @include('system.user._form', ['roles' => $roles])
                {!! Form::close() !!}
                @include('errors._form')
            </div>
        </section>
    </section>
</div>
@endsection