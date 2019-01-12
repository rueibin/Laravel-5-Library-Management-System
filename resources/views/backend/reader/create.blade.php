@extends('layouts.fixed_sidebar')

@section('content')



<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h2>讀者管理 / <a href="{{route('reader.index')}}">讀者管理</a></h2>
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
								<label class="control-label col-md-6 col-sm-6 col-xs-12" >新增讀者</label>
							</div>
						</div>
	
						<div class="x_content">
							<div class="col-md-8 col-sm-8 col-xs-12">
								<form action="{{route('reader.store')}}" method="POST" class="form-horizontal form-label-left" id="createForm">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="form-group {{ $errors->has('barcode') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">條碼</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入條碼" name="barcode" value="{{old('barcode')}}" />
											@if ($errors->has('barcode'))
												<span class="help-block">
													<strong>{{ $errors->first('barcode') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">姓名</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入姓名" name="name"  value="{{old('name')}}" />
											@if ($errors->has('name'))
												<span class="help-block">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('author') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">性別</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
                        					男<input type="radio" class="flat"  name="gender" value="1" checked /> 
                        					女<input type="radio" class="flat" name="gender" value="2" />
										</div>
									</div>

									<div class="form-group {{ $errors->has('tel') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">電話</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入電話，例：0426831532" name="tel"  value="{{old('tel')}}" minlength="10"  maxlength="15" />
											@if ($errors->has('tel'))
												<span class="help-block">
													<strong>{{ $errors->first('tel') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">手機</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入手機，例：0912345678" name="mobile"  value="{{old('mobile')}}" />
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
											<input type="text" class="form-control" placeholder="請輸入email" name="email"  value="{{old('email')}}" />
											@if ($errors->has('email'))
												<span class="help-block">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('borrow_book') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">可借圖書</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入可借圖書" name="borrow_book"  value="{{old('borrow_book')}}" />
											@if ($errors->has('borrow_book'))
												<span class="help-block">
													<strong>{{ $errors->first('borrow_book') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">狀態</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											啟用<input type="radio" class="flat"  name="status" value="1" checked /> 
                        					未啟用<input type="radio" class="flat" name="status" value="2" />
										</div>
									</div>

									<div class="form-group {{ $errors->has('memo') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">備註</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<textarea  style="width:100%;height:100px;" name="memo" placeholder="請輸入備註"></textarea>
											@if ($errors->has('memo'))
												<span class="help-block">
													<strong>{{ $errors->first('memo') }}</strong>
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