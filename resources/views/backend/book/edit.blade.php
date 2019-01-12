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
								<label class="control-label col-md-6 col-sm-6 col-xs-12" >編輯圖書檔案</label>
							</div>
						</div>
	
						<div class="x_content">
							<div class="col-md-8 col-sm-8 col-xs-12">
								<form action="{{route('book.update' , $book['id'])}}" method="POST" class="form-horizontal form-label-left"  enctype="multipart/form-data">
									<input name="_method" type="hidden" value="PUT">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="form-group {{ $errors->has('barcode') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">條碼</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入條碼" name="barcode" value="{{$book['barcode']}}" />
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
											<input type="text" class="form-control" placeholder="請輸入書名" name="name"  value="{{$book['name']}}" />
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
											<input type="text" class="form-control" placeholder="請輸入作者" name="author"  value="{{$book['author']}}" />
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
											<input type="text" class="form-control" placeholder="請輸入譯者" name="translator"  value="{{$book['translator']}}" />
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
											<select id="select_book_type_id" class="form-control" name="book_type_id"  value="{{$book['book_type_id']}}">
												@foreach($bookTypes as $bookType)
													<option value="{{$bookType['id']}}">{{$bookType['name']}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">出版社</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select id="select_publishing_id" class="form-control" name="publishing_id" value="{{$book['publishing_id']}}">
												@foreach($publishings as $publishing)
													<option value="{{$publishing['id']}}">{{$publishing['name']}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">價格</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入價格" name="price" value="{{$book['price']}}" maxlength="4" />
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
											<input type="text" class="form-control" placeholder="請輸入頁數" name="page"  value="{{$book['page']}}" maxlength="4" />
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
											<select id="select_book_case_id" class="form-control" name="book_case_id"  value="{{$book['book_case_id']}}" >
												@foreach($bookCases as $bookCase)
													<option value="{{$bookCase['id']}}">{{$bookCase['name']}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group {{ $errors->has('storage') ? ' has-error' : '' }}" >
										<label class="control-label col-md-4 col-sm-4 col-xs-12">數量</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" class="form-control" placeholder="請輸入數量" name="storage" value="{{$book['storage']}}" maxlength="3" />
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
											<input type="text" class="form-control" placeholder="請輸入出版日，例：2018-12-31" name="publication_day" value="{{$book['publication_day']}}" />
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
											<input type="file" class="form-control col-xs-10 col-sm-5" name="image" />
											檔案：<a href="{{asset('/upload/'.$book->image.'')}}" target="_blank">{{$book->image}}</a> 
											<input type="hidden" name="old_image" value="{{$book->image}}" />
											@if ($errors->has('image'))
												<span class="help-block">
													<strong>{{ $errors->first('image') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<button type="submit" class="btn btn-success pull-right" id="store-item">儲存</button>

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