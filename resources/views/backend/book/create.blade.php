@extends('layouts.fixed_sidebar')

@section('content')



<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h2>圖書檔案管理 / <a href="{{route('book.index')}}">圖書檔案管理</a></h2>
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
								<label class="control-label col-md-6 col-sm-6 col-xs-12" >新增圖書檔案</label>
							</div>
						</div>
	
						<div class="x_content">
							<div class="col-md-8 col-sm-8 col-xs-12">
								<form action="{{route('book.store')}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
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
										<label class="control-label col-md-4 col-sm-4 col-xs-12">書名</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入書名" name="name"  value="{{old('name')}}" />
											@if ($errors->has('name'))
												<span class="help-block">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('author') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">作者</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入作者" name="author"  value="{{old('author')}}" />
											@if ($errors->has('author'))
												<span class="help-block">
													<strong>{{ $errors->first('author') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('translator') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">譯者</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入譯者" name="translator"  value="{{old('translator')}}" />
											@if ($errors->has('translator'))
												<span class="help-block">
													<strong>{{ $errors->first('translator') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">圖書類型</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select id="select_book_type_id" class="form-control" name="book_type_id"  value="{{old('book_type_id')}}">
												@foreach($bookTypes as $bookType)
													<option value="{{$bookType['id']}}">{{$bookType['name']}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">出版社</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select id="select_publishing_id" class="form-control" name="publishing_id"  value="{{old('publishing_id')}}">
												@foreach($publishings as $publishing)
													<option value="{{$publishing['id']}}">{{$publishing['name']}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">價格</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入價格" name="price"  value="{{old('price')}}" maxlength="4" />
											@if ($errors->has('price'))
												<span class="help-block">
													<strong>{{ $errors->first('price') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('page') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">頁數</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入頁數" name="page"  value="{{old('page')}}" maxlength="4" />
											@if ($errors->has('page'))
												<span class="help-block">
													<strong>{{ $errors->first('page') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">書架</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select id="select_book_case_id" class="form-control" name="book_case_id"  value="{{old('book_case_id')}}">
												@foreach($bookCases as $bookCase)
													<option value="{{$bookCase['id']}}">{{$bookCase['name']}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group {{ $errors->has('storage') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">數量</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入數量" name="storage"  value="{{old('storage')}}" maxlength="3" />
											@if ($errors->has('storage'))
												<span class="help-block">
													<strong>{{ $errors->first('storage') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('publication_day') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">出版日</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入出版日，例：2018-12-31" name="publication_day"  value="{{old('publication_day')}}" />
											@if ($errors->has('publication_day'))
												<span class="help-block">
													<strong>{{ $errors->first('publication_day') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">圖書圖片</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="file" placeholder="請上傳圖片" class="form-control col-xs-10 col-sm-5" name="image"   value="{{old('image')}}"  />
											@if ($errors->has('image'))
												<span class="help-block">
													<strong>{{ $errors->first('image') }}</strong>
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