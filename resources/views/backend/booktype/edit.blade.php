@extends('layouts.fixed_sidebar')

@section('content')



<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h2>基本設定/圖書類型設定/編輯圖書類型</h2>
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
								<label class="control-label col-md-6 col-sm-6 col-xs-12" >編輯圖書類型</label>
							</div>
						</div>
	
						<div class="x_content">
							<div class="col-md-8 col-sm-8 col-xs-12">
								<form action="{{route('booktype.update', $booktype['id'])}}" method="POST" class="form-horizontal form-label-left" id="createForm">
									<input name="_method" type="hidden" value="PUT">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">圖書類型名稱</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入書架名稱" name="name" value="{{$booktype['name']}}" />
											@if ($errors->has('name'))
												<span class="help-block">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('borrow_day') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">天數</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入天數" name="borrow_day"value="{{$booktype['borrow_day']}}" maxlength="2"  />
											@if ($errors->has('borrow_day'))
												<span class="help-block">
													<strong>{{ $errors->first('borrow_day') }}</strong>
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