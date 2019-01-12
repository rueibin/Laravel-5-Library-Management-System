@extends('layouts.fixed_sidebar')

@section('content')



<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h2>權限管理 / <a href="{{route('role.index')}}">角色管理</a></h2>
				</div>
	
				<div class="title_right">
					<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					</div>
				</div>
			</div>
	
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<div class="row">
								<label class="control-label col-md-6 col-sm-6 col-xs-12" >新增角色</label>
							</div>
						</div>
	
						<div class="x_content">
							<div class="col-md-8 col-sm-8 col-xs-12">
								<form action="{{route('role.store')}}" method="POST" class="form-horizontal form-label-left" id="createForm">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" class="form-control" placeholder="" name="permissions">

									<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">角色</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入角色" name="name" value="{{old('name')}}" />
											@if ($errors->has('name'))
												<span class="help-block">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">角色名稱</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入角色名稱" name="display_name" value="{{old('display_name')}}" />
											@if ($errors->has('display_name'))
												<span class="help-block">
													<strong>{{ $errors->first('display_name') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('permissions') ? ' has-error' : '' }}">
										<label class="control-label col-md-4 col-sm-4 col-xs-12">權限管理</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<div id="treeview-checkbox-create">
												<ul>
												@foreach($permissions as $permission)
														<li data-value="{{$permission->id}}">{{$permission->display_name}}
														@if($permission->child)
															<ul>
															@foreach($permission->child as $child)
																<li data-value="{{$child->id}}">{{$child->display_name}}
																@if($child->child)
																	<ul>
																	@foreach($child->child as $sub_child)
																		<li data-value="{{$sub_child->id}}">{{$sub_child->display_name}}
																		@if($sub_child->child)
																			<ul>
																				@foreach($sub_child->child as $sub_sub_child)
																					<li data-value="{{$sub_sub_child->id}}">{{$sub_sub_child->display_name}}
																				@endforeach
																			</ul>
																		@endif
																		</li>
																	@endforeach
																	</ul>
																@endif
																</li>
															@endforeach
															</ul>
														@endif
														</li>
													@endforeach			
												</ul>
											</div>

											<div class="clearfix"></div>
											<div class="col-sm-4 center">
												<span class="text-danger">{{ $errors->first('permissions') }}</span>
											</div>
										</div>
									</div>

									<div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">描述</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<textarea class="form-control" id="form-field-8" placeholder="請輸入描述" class="col-xs-10 col-sm-10" name="description">{{ old('description') }}</textarea>
											@if ($errors->has('display_name'))
												<span class="help-block">
													<strong>{{ $errors->first('display_name') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<button type="submit" class="btn btn-success pull-right" id="store-item">新增</button>

								</form>
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
	
	<!-- treeview -->
	<script src="{{asset('/vendors/treeview/logger.js')}}"></script>
	<script src="{{asset('/vendors/treeview/treeview.js')}}"></script>

	<script>
		$(function(){
			//treeview 
			$('#treeview-checkbox-create').treeview({
				debug : true,
				autoExpand:true
			});
			//permissions set value
			$('#store-item').click(function(){  
				var permissions=$('#treeview-checkbox-create').treeview('selectedValues');
				$("input[name='permissions']").val(permissions);
			});
		});
	</script>
@endsection