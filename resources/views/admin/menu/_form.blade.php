<div class="form-group">
    <label for="title" class="col-md-3 control-label">
        标题
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="title" id="title" value="{{ $title }}">
    </div>
</div>

<div class="form-group">
    <label for="meta_description" class="col-md-3 control-label">
        模块
    </label>
    <div class="col-md-3">
        <select name="parent_id" class="form-control" id="parent_id">
            <option name="parent_id" value="0">新模块</option>
            @foreach ($parent_list as $parent)
                <option name="parent_id" value="{{ $parent->id }}" @if($parent_id == $parent->id)selected="selected"@endif>{{ $parent->title }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="icon" class="col-md-3 control-label">
        图标
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="icon" id="icon" value="{{ $icon }}">
    </div>
</div>

<div class="form-group">
    <label for="order" class="col-md-3 control-label">
        排序
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="order" id="order" value="{{ $order }}">
    </div>
</div>

<div class="form-group">
    <label for="status" class="col-md-3 control-label">
        状态
    </label>
    <div class="col-md-3">
        <select name="status" class="form-control" id="status">
            <option name="status" value="1">显示</option>
            <option name="status" value="0">隐藏</option>
        </select>
    </div>
</div>
