<div class="form-group">
    <label class="col-sm-1 control-label">角色名称</label>
    <div class="col-sm-11">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-1 control-label">角色描述</label>
    <div class="col-sm-11">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-1 control-label">选择权限</label>
    <div class="col-sm-11">
        <table class="table table-striped table-advance table-hover">
            @if ($nodes)
            @foreach ($nodes as $node)
            <tr class="tit">
                <td class="col-sm-2 tit-l">{!! Form::checkbox('node', $node['id'], '', ['class' => 'chieftain']) !!}{{ $node['name'] }}</td>
                <td class="col-sm-9 tit-r">
                    @if (!empty($node['childs']))
                    @foreach ($node['childs'] as $child)
                    <label class="col-sm-3">
                    {!! Form::checkbox('action[]', $child['id'], isset($actions) && in_array($child['id'], $actions) ? 'true' : '', ['class' => 'staff']) !!}{{ $child['name'] }}
                    </label>
                    @endforeach
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
<div class="form-group">
    {!! Form::submit('保存', ['class' => 'btn btn-block btn-primary']) !!}
</div>
<script type="text/javascript">
    $(".chieftain").click(function () {
        var chieftainSon = $(this).parent(".tit-l").siblings(".tit-r").children("label").children("input[type='checkbox']");
        chieftainSon.prop("checked", this.checked);
    });
    $(".staff").click(function () {
        var staffLead = $(this).parent("label").parent(".tit-r").siblings(".tit-l").children("input[type='checkbox']");
        var thisSelf = $(this).parent("label").parent(".tit-r").children("label").children("input[type='checkbox']");
        var flag = true;
        thisSelf.each(function () {
            if (!this.checked) {
                flag = false;
            }
        });
        staffLead.attr("checked", flag);
        staffLead.prop("checked", thisSelf.length == thisSelf.filter(":checked").length);
    });
</script>