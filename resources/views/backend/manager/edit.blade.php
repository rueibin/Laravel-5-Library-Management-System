@extends('layouts.fixed_sidebar')

@section('content')



<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h2>權限管理 / <a href="{{route('manager.index')}}">帳號管理</a></h2>
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
								<label class="control-label col-md-6 col-sm-6 col-xs-12" >編輯帳號</label>
							</div>
						</div>
	
						<div class="x_content">
							<div class="col-md-8 col-sm-8 col-xs-12">
								<form action="{{route('manager.update',$manager->id)}}" method="POST" class="form-horizontal form-label-left" id="createForm">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input name="_method" type="hidden" value="put">

									<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">帳號</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入帳號" name="username" value="{{$manager->username}}" />
											@if ($errors->has('username'))
												<span class="help-block">
													<strong>{{ $errors->first('username') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group " >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">性別</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											@if($manager->gender==1)
												男<input type="radio" class="flat"  name="gender" value="1" checked /> 
												女<input type="radio" class="flat" name="gender" value="2" />
											@else
												男<input type="radio" class="flat"  name="gender" value="1"  /> 
												女<input type="radio" class="flat" name="gender" value="2" checked />
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">手機</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入手機，例：0912345678" name="mobile"  value="{{$manager->mobile}}" />
											@if ($errors->has('mobile'))
												<span class="help-block">
													<strong>{{ $errors->first('mobile') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">email</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入email" name="email"  value="{{$manager->email}}" />
											@if ($errors->has('email'))
												<span class="help-block">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">狀態</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											@if($manager->status==1)
												啟用<input type="radio" class="flat"  name="status" value="1" checked /> 
                        						未啟用<input type="radio" class="flat" name="status" value="2" />
											@else
												啟用<input type="radio" class="flat"  name="status" value="1"  /> 
                        						未啟用<input type="radio" class="flat" name="status" value="2" checked />
											@endif
											
										</div>
									</div>
									
									<div class="form-group" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">角色</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select id="roles" class="form-control" name="roles"  />
												@foreach($roles as $role)
													<option value="{{$role['id']}}">{{$role['name']}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<button type="submit" class="btn btn-success pull-right" id="store-item">更新</button>

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
	<script>
		$('#roles').val("{{$manager->role[0]->id}}");
	</script>
@endsection