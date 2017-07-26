@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            开场网后台管理
            <small>管理员：{{ session('master')->name }}</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="height: 800px;">
                    @if(session('info'))
                        <div class="alert alert-danger">
                            {{ session('info') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box bg-red" style="margin: 20px; border-radius: 5px; box-shadow: 5px 4px 2px #ccc; ">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">用户</span>
                                    <span class="info-box-number">{{ $data['users'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box bg-green" style="margin: 20px; border-radius: 5px; box-shadow: 5px 4px 2px #ccc; ">
                                <span class="info-box-icon"><i class="fa fa-user-secret"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">入驻商户</span>
                                    <span class="info-box-number">{{ $data['shopkeepers'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box bg-aqua" style="margin: 20px; border-radius: 5px; box-shadow: 5px 4px 2px #ccc; ">
                                <span class="info-box-icon"><i class="fa fa-home"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">上架场地</span>
                                    <span class="info-box-number">{{ $data['places'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box bg-yellow" style="margin: 20px; border-radius: 5px; box-shadow: 5px 4px 2px #ccc; ">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-tags"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">成交量</span>
                                    <span class="info-box-number">{{ $data['sales'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

    @endsection

@section('js')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //绑定一次双击事件
        $(".name").one('dblclick',update);

        //双击事件封装函数
        function update() {

            var td = $(this);

            //获取id
            var id = $(this).parent('.parent').find('.ids').html();

            //获取原来的值
            var oldName = $(this).html();

            var inp = $("<input type='text'>");
            inp.val(oldName);
            $(this).html(inp);

            //直接选中
            inp.select();

            inp.on('blur', function () {

                //获取新名
                var newName = inp.val();
                //执行ajax
                $.ajax('/admin/user/ajaxrename', {
                    type: 'POST',
                    data: {id: id, name: newName},
                    success: function (data) {
                        if (data == '0') {
                            alert('管理员名已经存在');
                            td.html(oldName);
                        } else if (data == '1') {
                            td.html(newName);
                        } else {
                            alert('修改失败');
                        }
                    },
                    error: function (data) {
                        alert('数据异常');
                    },
                    dataType: 'json'
                });

                //再绑定一次双击事件
                td.one('dblclick', update);
            });
        }

        //全局变量
        var id=0;

        $(".del").click(function(){

            id=$(this).parents('.parent').find('.ids').html();
        });


        // 每页条数下拉框选中事件
        $('#num').on('change', function(){
            $('form').eq(0).submit();
        });

        // 状态开启关闭
        $('.status_sel').on('click', function(){
            var index = $(this).attr('index');
            var id = $(this).parents('.parent').find('.ids').html();
            var status = $.trim($(this).html());

            $(this).html($(this).parents('.btn-group').find('.status_show').html());
            $(this).parents('.btn-group').find('.status_show').html(status);

            if(status == '禁用')
            {
                var value = 0;
            }else
            {
                var value = 1;
            }

            $.ajax('/admin/user/ajaxrestatus', {
                type: 'POST',
                data: {id: id, table: index, status: value},
                success: function (data) {
                    if(data == 0) {
                        alert('修改失败，稍后重试');
                    }
                },
                error: function (data) {
                    alert('数据异常，稍后重试');
                },
                dataType: 'json'
            });

        });


    </script>
@endsection

@section('modaljs')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">提示信息</h4>
                </div>
                <div class="modal-body">
                    确定要删除此条数据吗?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" id="delete">确认删除</button>
                </div>
            </div>
        </div>
    </div>

    <script !src="">

        $("#delete").click(function(){
            location.href="/admin/user/delete/"+id;
        });

    </script>

@endsection