@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-table"></i> 用户浏览</span>
	</div>
	<div class="mws-panel-body no-padding">
		<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
		<form action="/admin/user/index" method="get">
			<div id="DataTables_Table_1_length" class="dataTables_length">
				<label>Show
					<select size="1" name="num" aria-controls="DataTables_Table_1">
						<option value="5"
							@if(!empty($request['num']) && $request['num']=='5')
								selected
							@endif
						>5</option>
						<option value="10"
							@if(!empty($request['num']) && $request['num']=='10')
								selected
							@endif
						>10</option>
						<option value="25"
							@if(!empty($request['num']) && $request['num']=='25')
								selected
							@endif
						>25</option>
						<option value="50"
							@if(!empty($request['num']) && $request['num']=='50')
								selected
							@endif
						>50</option>
						<option value="100"
							@if(!empty($request['num']) && $request['num']=='100')
								selected
							@endif
						>100</option>
					</select> entries
				</label>
			</div>
			<div class="dataTables_filter" id="DataTables_Table_1_filter">
				<label>Search: 
					<input value='@if(!empty($request['keyword'])){{$request['keyword']}}@endif' name="keyword" aria-controls="DataTables_Table_1" type="text">
				</label>

				<input type="submit" value="搜索" class="btn btn-primary">
			</div>
		</form>
		<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
			<thead>
			    <tr role="row">
				    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 99px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
				    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Browser: activate to sort column ascending">用户名</th>
				    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 124px;" aria-label="Platform(s): activate to sort column ascending">邮箱</th>
				    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 82px;" aria-label="Engine version: activate to sort column ascending">电话</th>
				    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 56px;" aria-label="CSS grade: activate to sort column ascending">会员等级</th>
				    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 56px;" aria-label="CSS grade: activate to sort column ascending">状态</th>
				    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 56px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
			    </tr>
			</thead>

			<tbody role="alert" aria-live="polite" aria-relevant="all">
				@foreach($list as $k=>$v)
				@if($k%2==0)
					<tr class="odd">
				@else
					<tr class="even">
				@endif
				        <td class="  sorting_1">{{$v['id']}}</td>
				        <td class=" ">{{$v['username']}}</td>
				        <td class=" ">{{$v['email']}}</td>
				        <td class=" ">{{$v['phone']}}</td>
				         <td class=" ">
				        	@if($v['vip']==0)
				        		超级管理员
							@elseif($v['vip']==1)
								普通管理员
							@else
								普通会员
							@endif
				        </td>
				        <td class=" ">
				        	@if($v['status']==1)
				        		启用
							@else
								禁用
							@endif
				        </td>
				        <td class=" ">
				        	<a class="icon-pencil" href="/admin/user/edit/{{$v['id']}}"> 修改 </a>&nbsp;&nbsp;
				        	<a class="icon-remove" href="/admin/user/del/{{$v['id']}}"> 删除 </a>
				        </td>
				    </tr>
			    @endforeach
			</tbody>
		</table>
			<!-- 分页开始 -->
			<div class="dataTables_paginate paging_full_numbers" id="page">
			<!-- 参数注入 给分页的url注入跳转页大小参数-->
				{!!$list->appends($request)->render()!!}
			</div>

			<!-- 分页结束 -->
		</div>
	</div>
</div>
@endsection