@if (count($errors) > 0)
<div class="alert alert-danger">
    <h5>请修改下面的错误信息</h5>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif