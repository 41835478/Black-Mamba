@extends('layout.adminindex')
@section('con')
<script type="text/javascript" charset="utf-8" src="/ue/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ue/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ue/lang/zh-cn/zh-cn.js"></script>

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>商品修改</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form action="/admin/orders/update" class="mws-form" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value='{{$vo['id']}}'>
    		{{csrf_field()}}
    		<div class="mws-form-inline">
            <div class="mws-form-row">
                <label class="mws-form-label">订单状态</label>
                 <div class="mws-form-item">
                    <ul class="mws-form-list inline">
                            <li>
                                <input type="radio" name="status" value="0"
                                  @if($vo['status']=='0')
                                     checked
                                  @endif
                                ><label>新订单</label>
                            </li>
                            <li>
                                <input type="radio" name="status" value="1"
                                  @if($vo['status']=='1')
                                     checked
                                  @endif
                                ><label>已发货</label>
                            </li>
                            <li>
                                <input type="radio" name="status" value="2"
                                   @if($vo['status']=='2')
                                     checked
                                   @endif
                                ><label>已收货</label>
                            </li>
                             <li>
                                <input type="radio" name="status" value="3"
                                   @if($vo['status']=='3')
                                     checked
                                   @endif
                                ><label>无效订单</label>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    		<div class="mws-button-row">
    			<input type="submit" class="btn btn-danger" value="提交">
    			<input type="reset" class="btn " value="重置">
    		</div>
    	</form>
    </div>    	
</div>
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>
@endsection	