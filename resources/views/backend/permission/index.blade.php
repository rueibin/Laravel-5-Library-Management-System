@extends('layouts.fixed_sidebar')

@section('content')



<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h2>權限管理 /  <a href="{{route('permission.index')}}">權限管理</a></h2>
				</div>
	
				<div class="title_right">
					<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					</div>
				</div>
			</div>
	
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<div class="row">
								<div class="col-md-2">
									@permission('permission-create')
										<a href="{{route('permission.create')}}" class="btn btn-primary "> 新增 </a>
									@endpermission
								</div>
							</div>
						</div>

                        <!-- display message -->
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif	
                        <!-- end display message -->
                                
						<div class="x_content">
							<table class="table table-bordered table-hover custom_center ">
								<colgroup>
									{{--  <col style="width:5%">
                                    <col style="width:%">
									<col style="width:20%">
									<col style="width:%">
									<col style="width:%">
									<col style="width:%">
									<col style="width:%">
									<col style="width:%">
									<col style="width:%">
									<col style="width:%">
									<col style="width:5%">
									<col style="width:%">
									<col style="width:%">
									<col style="width:%">  --}}
								</colgroup>
								<thead>
									<tr>
										<th>權限</th>
										<th>SLUG</th>
										<th>URL</th>											
										<th>權限名稱</th>
										<th>menu</th>
										<th>建立時間</th>
										<th>操作</th>
									</tr>
								</thead>

								<tbody>
                                    @foreach($permission as $v )
                                    <tr>
										<td>{{$v->name}}</td>
										<td>{{$v->slug}}</td>
										<td>{{$v->url}}</td>
										<td>{{$v->display_name}}</td>
										<td>@if($v->menu==1) 是 @else 不是 @endif </td>
                                        <td>{{$v->created_at}}</td>
										<td>
											@permission('permission-edit')
                                            	<a href="{{route('permission.edit', $v->id )}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 編輯 </a>
											@endpermission
											
											@permission('permission-delete')
											<form method="POST" action="{{route('permission.destroy' , $v->id)}}" accept-charset="UTF-8" style="display:inline">
												<input name="_method" type="hidden" value="DELETE">
											    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <button type="submit" class="btn btn-danger btn-xs remove"><i class="fa fa-trash-o"></i> 刪除</button>
											</form>
											@endpermission
                                        </td>
									</tr>
										@if($v->child) 
											@foreach($v->child as $vv)
											<tr>
												<td style="text-indent:25px;">├──{{$vv->name}}</td>
												<td>{{$vv->slug}}</td>
												<td>{{$vv->url}}</td>
												<td>{{$vv->display_name}}</td>
												<td>@if($vv->menu==1) 是 @else 不是 @endif </td>
												<td>{{$vv->created_at}}</td>
												<td>
													@permission('permission-edit')
													<a href="{{route('permission.edit', $vv->id )}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 編輯 </a>
													@endpermission

													@permission('permission-delete')
													<form method="POST" action="{{route('permission.destroy' , $vv->id)}}" accept-charset="UTF-8" style="display:inline">
														<input name="_method" type="hidden" value="DELETE">
														<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
														<button type="submit" class="btn btn-danger btn-xs remove"><i class="fa fa-trash-o"></i> 刪除</button>
													</form>
													@endpermission
												</td>
											</tr>
											@if($vv->child) 
												@foreach($vv->child as $vvv)
												<tr>
													<td style="text-indent:50px;">├──{{$vvv->name}}</td>
													<td>{{$vvv->slug}}</td>
													<td>{{$vvv->url}}</td>
													<td>{{$vvv->display_name}}</td>
													<td>@if($vvv->menu==1) 是 @else 不是 @endif </td>
													<td>{{$vvv->created_at}}</td>
													<td>
														@permission('permission-edit')
														<a href="{{route('permission.edit', $vvv->id )}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 編輯 </a>
														@endpermission

														@permission('permission-delete')
														<form method="POST" action="{{route('permission.destroy' , $vvv->id)}}" accept-charset="UTF-8" style="display:inline">
															<input name="_method" type="hidden" value="DELETE">
															<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
															<button type="submit" class="btn btn-danger btn-xs remove"><i class="fa fa-trash-o"></i> 刪除</button>
														</form>
														@endpermission

													</td>
												</tr>
												@if($vvv->child) 
													@foreach($vvv->child as $vvvv)
													<tr>
														<td style="text-indent:75px;">├──{{$vvvv->name}}</td>
														<td>{{$vvvv->slug}}</td>
														<td>{{$vvvv->url}}</td>
														<td>{{$vvvv->display_name}}</td>
														<td>@if($vvvv->menu==1) 是 @else 不是 @endif </td>
														<td>{{$vvvv->created_at}}</td>
														<td>
															@permission('permission-edit')
															<a href="{{route('permission.edit', $vvvv->id )}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 編輯 </a>
															@endpermission

															@permission('permission-delete')
															<form method="POST" action="{{route('permission.destroy' , $vvvv->id)}}" accept-charset="UTF-8" style="display:inline">
																<input name="_method" type="hidden" value="DELETE">
																<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
																<button type="submit" class="btn btn-danger btn-xs remove"><i class="fa fa-trash-o"></i> 刪除</button>
															</form>
															@endpermission
														</td>
													</tr>
													@endforeach
												@endif
												@endforeach
											@endif
											@endforeach
										@endif
									@endforeach
								</tbody>
                            </table>
                            </div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

@endsection

@section('script')
	<script>
		$(".remove").click(function(){
			if(confirm('確定要刪除嗎!')){ }else{ return false; } 
		});
	</script>
@endsection