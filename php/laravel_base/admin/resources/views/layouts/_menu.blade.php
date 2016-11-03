<div id="sidebar" class="nav-collapse">
    <ul class="sidebar-menu" id="nav-accordion">
        <li class="sub-menu">
            <a href="javascript:;" route="system">
                <i class="fa fa-cogs">
                </i>
                <span>系统设置</span>
                <span class="label label-success span-sidebar">4</span>
            </a>
            <ul class="sub">
                <li>{{ link_to_route('system_user_index', '管理员列表', [], ['route' => 'system_user_index']) }}</li>
                <li>{{ link_to_route('system_user_create', '添加管理员', [], ['route' => 'system_user_create']) }}</li>
                <li>{{ link_to_route('system_node_index', '节点列表', [], ['route' => 'system_node_index']) }}</li>
                <li>{{ link_to_route('system_role_index', '角色列表', [], ['route' => 'system_role_index']) }}</li>
                <li>{{ link_to_route('system_role_create', '添加角色', [], ['route' => 'system_role_create']) }}</li>
            </ul>
        </li>
    </ul>
</div>
<script type="text/javascript">
    var routeName = '{{ \Route::currentRouteName()}}';
    var routeArray = routeName.split('_');

    var route = routeArray[0];
    if ($("a[route=" + route + "]").length > 0) {
        setTimeout(function () {
            $('.start').removeClass();
            $("a[route=" + route + "]").click();
            $("a[route=" + routeName + "]").parent('li').addClass('start active');
        }, 1)
    }
</script>