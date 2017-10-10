@extends('layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="index.html">UI库首页</a>
                </li>
                <li>
                    <a href="javascript:void(0)">表单</a>
                </li>
                <li>
                    <a href="elements.html">表单元素</a>
                </li>
            </ul><!-- /.breadcrumb -->

            <!-- #section:basics/content.searchbox -->
            <div class="nav-search" id="nav-search">
                <form class="form-search" action="/article/postCreate" method="post">
							<span class="input-icon">
								<input type="text" placeholder="请输入关键字 ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
                </form>
            </div>
        </div>
        <div class="page-content">
            <div class="page-content-area">
                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal" role="form" action="/article/postCreate" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 标题：</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="输入部门名称" name="title" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">文章描述： </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" name="detail" placeholder="输入差旅单名称" class=" col-xs-10 col-sm-5" />
                                </div>
                            </div>

                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">文章分类：</label>
                                <div class="col-sm-9">
                                    <span class="input-icon">
                                        <select class="form-control" id="form-field-select-1" name="class">
                                            <option value="">请选择状态</option>
                                            <option value="AL">未提交</option>
                                            <option value="AK">已提交</option>
                                            <option value="AZ">待审核</option>
                                            <option value="AR">审核通过</option>
                                        </select>
                                    </span>
                                    <span class="input-icon input-icon-right">
                                        <select class="form-control" id="form-field-select-1" name="status">
                                            <option value="">请选择状态</option>
                                            <option value="0">未提交</option>
                                            <option value="1">已提交</option>
                                            <option value="2">待审核</option>
                                            <option value="3">审核通过</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2">上传标题图: </label>
                                <input type="file" name="test[]" id="test"/><img src="" class="images" id="img" style="width:120px;">
                                <input type="hidden" name="imgurl" id="imgurl" value=""/>
                            </div>
                            <div class="form-group">
                                 <textarea id="container" autocomplete="off"  name="content"
                                           type="text/plain">
                            </textarea>
                            </div>
                            <input type="hidden" value="{{csrf_token()}}" name="_token" id="_token"/>
                            <div class="clearfix form-actions">
                                <div class="col-md-offset-5 col-md-9">
                                    <input type="submit" class="btn btn-info" value="立即提交">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
    <!-- page specific plugin scripts -->
    <script src="/js/upload.js"></script>
    <script>
        $('input[name="test[]"]').UploadImg({
            url : '/article/upload',
            // width : '320',
            //height : '200',
            quality : '0.8', //压缩率，默认值为0.8
            // 如果quality是1 宽和高都未设定 则上传原图
            mixsize : '10000000',
            //type : 'image/png,image/jpg,image/jpeg,image/pjpeg,image/gif,image/bmp,image/x-png',
            before : function(blob){
            $('#img').attr('src',blob);
                var img = '<img class="images" width="100px" height="100px" src="'+blob+'"/>';
                var inputImg = '<input type="hidden" name="pic[]" value="'+blob+'"/>';
                $('.uploadImg').append(img);
                $('.articleForm').append(inputImg);
            },
            error : function(res){
                $('#img').attr('src','');
                $('#error').html(res);
            },
            success : function(res){
                $('#imgurl').val(res);
            }
        });
    </script>

@endsection
@section('css')
    <style>
        #navbar{
            width:1250px;
        }
        #main-container{
            width:1200px;
            margin: 0px;
            padding:0px;
        }
    </style>
@endsection