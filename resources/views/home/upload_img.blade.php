

<!-- 上传图片div /S-->
<div class="upload-mask">
</div>
<div class="panel panel-info upload-file">
    <div class="panel-heading">
        上传图片
        <span class="close pull-right">关闭</span>
    </div>
    <div class="panel-body">
        <div id="validation-errors"></div>
        {!! Form::open( array('url' =>['/upload_img'], 'method' => 'post', 'id'=>'imgForm', 'files'=>true) ) !!}
        <div class="form-group">
            <label>图片上传</label>
            <span class="require">(*)</span>
            <input id="thumb" name="file" type="file"  required="required">
            <input id="imgID"  type="hidden" name="id" value="">

        </div>
        {!!Form::close()!!}
    </div>
    <div class="panel-footer">
    </div>
</div>

<!-- 上传图片div /E-->

