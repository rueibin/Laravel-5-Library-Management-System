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
								<div class="col-md-2">
                                    {{--  <button type="button" class="btn btn-success" id="create-item">新增</button>  --}}
									@permission('book-create')
										<a href="{{route('book.create')}}" class="btn btn-primary "> 新增 </a>
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
										<th>id</th>
										<th>條碼</th>
										<th>書名</th>
										<th>作者</th>
										<th>譯者</th>
										<th>圖書類型</th>
										<th>出版社</th>
										<th>價格</th>
										<th>頁數</th>
										<th>書架</th>
										<th>數量</th>
										<th>出版日</th>
										<th>建立時間</th>
                                        <th>操作</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($book as $v )
                                    <tr>
                                        <td>{{$v->id}}</td>
										<td>{{$v->barcode}}</td>
										<td>{{$v->name}}</td>
										<td>{{$v->author}}</td>
										<td>{{$v->translator}}</td>
										<td>{{$v->bookType->name}}</td>
										<td>{{$v->publishing->name}}</td>
										<td>{{$v->price}}</td>
										<td>{{$v->page}}</td>
										<td>{{$v->bookCase->name}}</td>
										<td>{{$v->storage}}</td>
										<td>{{$v->publication_day}}</td>
                                        <td>{{$v->created_at}}</td>
										<td>
											@permission('book-edit')
                                            <a href="{{route('book.edit', $v->id )}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 編輯 </a>
											@endpermission
											@permission('book-delete')
											<form method="POST" action="{{route('book.destroy' , $v->id)}}" accept-charset="UTF-8" style="display:inline">
												<input name="_method" type="hidden" value="DELETE">
											    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <button type="submit" class="btn btn-danger btn-xs remove"><i class="fa fa-trash-o"></i> 刪除</button>
											</form>
											@endpermission
                                        </td>
                                    </tr>
                                    @endforeach
								</tbody>
                            </table>
                             {{ $book->links() }}
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