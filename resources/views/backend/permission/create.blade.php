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
								<label class="control-label col-md-6 col-sm-6 col-xs-12" >新增權限</label>
							</div>
						</div>
	
						<div class="x_content">
							<div class="col-md-8 col-sm-8 col-xs-12">
								<form action="{{route('permission.store')}}" method="POST" class="form-horizontal form-label-left" id="createForm">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="form-group" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">權限層級</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select id="select_book_type_id" class="form-control" name="pid" value="{{old('pid')}}">
												<option value="0">頂級層級</option> 
												@foreach($pids as $pid)
													<option value="{{$pid->id}}">{{$pid->display_name}}</option>
													@if($pid->child)
													@foreach ($pid->child as $child)
														<option value="{{$child->id}}">&nbsp;&nbsp;├─{{$child->display_name}}</option>
														@if($child->child)
														@foreach ($child->child as $sub_child)
															<option value="{{$sub_child->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─{{$sub_child->display_name}}</option>
														@endforeach
														@endif
													@endforeach
													@endif
												@endforeach			
											</select>
										</div>
									</div>

									<div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">顯示名稱</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入權限名稱（中文）" name="display_name"  value="{{old('display_name')}}" />
											@if ($errors->has('display_name'))
												<span class="help-block">
													<strong>{{ $errors->first('display_name') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">權限</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入權限" name="name"  value="{{old('name')}}" />
											@if ($errors->has('name'))
												<span class="help-block">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">slug</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入路由別名" name="slug"  value="{{old('slug')}}" />
											@if ($errors->has('slug'))
												<span class="help-block">
													<strong>{{ $errors->first('slug') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">url</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入url" name="url"  value="{{old('url')}}" />
											@if ($errors->has('url'))
												<span class="help-block">
													<strong>{{ $errors->first('url') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">是不是menu</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											是<input type="radio" class="flat"  name="menu" value="1" checked /> 
                        					不是<input type="radio" class="flat" name="menu" value="2" />
										</div>
									</div>

									<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">描述</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<textarea  style="width:100%;height:100px;" name="description" placeholder="請輸入備註"></textarea>
											@if ($errors->has('description'))
												<span class="help-block">
													<strong>{{ $errors->first('description') }}</strong>
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