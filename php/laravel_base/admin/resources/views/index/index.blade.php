@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <div class="row state-overview">
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol">
                    <i class="fa fa-user blue"></i>
                </div>
                <div class="value">
                    <h1 class="count">{{ link_to_route('system_user_index', $count['user']) }}</h1>
                    <p>{{ link_to_route('system_user_index', '管理员') }}</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol">
                    <i class="fa fa-tags red"></i>
                </div>
                <div class="value">
                    <h1 class=" count2">{{ link_to_route('system_node_index', $count['node']) }}</h1>
                    <p>{{ link_to_route('system_node_index', '节点') }}</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol">
                    <i class="fa fa-user yellow"></i>
                </div>
                <div class="value">
                    <h1 class=" count2">{{ link_to_route('system_role_index', $count['role']) }}</h1>
                    <p>{{ link_to_route('system_role_index', '角色') }}</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol">
                    <i class="fa fa-shopping-cart purple"></i>
                </div>
                <div class="value">
                    <h1 class=" count4">10328</h1>
                    <p>New Orders</p>
                </div>
            </section>
        </div>
    </div>
    <div class="well">欢迎访问后台管理系统！</div>
</div>
@endsection