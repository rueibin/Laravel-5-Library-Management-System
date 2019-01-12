@extends('layouts.fixed_sidebar')

@section('content')



<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h2>借閱排行榜</h2>
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
                                
						<div class="x_content">
							@if(!is_null($home))
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
										<th>排名</th>
										<th>書名</th>
										<th>圖書類型</th>
										<th>書架</th>
										<th>出版社</th>
										<th>作者</th>
										<th>價格</th>
										<th>借閱次數</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($home as $v )
                                    <tr>
                                        <td>{{$v['no']}}</td>
										<td>{{$v['book_name']}}</td>
										<td>{{$v['book_type']}}</td>
										<td>{{$v['book_case']}}</td>
										<td>{{$v['publishing']}}</td>
										<td>{{$v['author']}}</td>
										<td>{{$v['price']}}</td>
										<td>{{$v['count']}}</td>
                                    </tr>
                                    @endforeach
								</tbody>
							</table>
							@else
							目前沒有排行榜
							@endif
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