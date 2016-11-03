@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li>{{ link_to_route('index_index', '首页') }}</li>
        <li>&GT;</li>
        <li>{{ link_to_route('system_node_index', '节点列表') }}</li>
        <li>&GT;</li>
        <li class="active">修改节点</li>
    </ul>

    <section class="panel">
        <section class="panel">
            <div class="panel-body">
                {!! Form::model($node, ['route' => ['system_node_storeupdate', 'id' => $node->id], 'class' => 'form-horizontal tasi-form', 'method' => 'put']) !!}
                <div class="form-group">
                    <label class="col-sm-1 control-label">节点名称</label>
                    <div class="col-sm-11">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">节点位置</label>
                    <div class="col-lg-11">
                        <p class="form-control-static">{{ $node->path }}</p>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('保存', ['class' => 'btn btn-block btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                @include('errors._form')
            </div>
        </section>
    </section>
</div>
@endsection