@extends('layouts.fixed_sidebar')

@section('content')



<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h2>圖書借還管理 / <a href="{{route('borrow.back')}}">圖書歸還</a></h2>
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
									<label class="control-label col-md-6 col-sm-6 col-xs-12" >讀者確認</label>
								</div>
								
							</div>
		
							<div class="x_content">
								<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group ">
											<label>讀者條碼</label>
											<input id="reader_barcode" type="text" name="reader_barcode" class="form-control" />
										</div>
								<div class="x_title"></div>
								
								<div class="row">
									<div class="form-inline reader_barcode">
									</div>
								</div>
								
								<table class="table table-bordered table-hover custom_center ">
									<colgroup>
										<col style="width:25%">
										<col style="width:25%">
										<col style="width:25%">
										<col style="width:25%"> 
									</colgroup>
									<thead>
										<tr>
											<th>書名</th>
											<th>作者</th>
											<th>借閱時間</th>
											<th>應還時間</th>
										</tr>
									</thead>
									<tbody class="borrow">
									</tbody>
									</tbody>
								</table>
								

							</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<div class="row">
									<label class="control-label col-md-6 col-sm-6 col-xs-12" >圖書歸還</label>
								</div>
								
							</div>
		
							<div class="x_content">
								<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group ">
											<label>圖書條碼</label>
											<input id="book_barcode" type="text" name="book_barcode" class="form-control" />
										</div>
									</form>
									
								<div class="x_title"></div>

								
								<table class="table table-bordered table-hover custom_center ">
									<colgroup>
										<col style="width:45%">
										<col style="width:25%">
										@permission('borrow-return')
										<col style="width:15%">
										@endpermission
									</colgroup>
									<thead>
										<tr>
											<th>書名</th>
											<th>作者</th>
											@permission('borrow-return')
											<th>操作</th>
											@endpermission
										</tr>
									</thead>
									<tbody class="book">
									</tbody>
									
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

		$('#reader_barcode').change(function () { 
			ajax_get_reader($(this).val());
		});

		$('#book_barcode').change(function () { 
			//console.log($(this).val());
			$.ajax({
				url: "{{route('borrow.getBookBorrow')}}",
				type: 'post',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				dataType: 'JSON',
				data:{book_barcode:$(this).val()},
			}).done(function (data) {
				//console.log(data);
				if(data['error']=='noborrow')
				{
					alert('沒有借閱此書');
					exit;
				}
				var book_rows="";
				$.each( data, function( key, value ) {
					book_rows=book_rows + '<tr>';
					book_rows=book_rows + '<td>' + value['name']  + '</td>';
					book_rows=book_rows + '<td>' + value['author']  + '</td>';
					book_rows=book_rows + '@permission('borrow-return')<td data-id="'+ value['id'] +'"><button type="button" class="btn btn-success item-add">歸還</button></td>@endpermission';
					book_rows=book_rows + '</tr>';
					//console.log( value['name']);	
				});
				$('.book').append(book_rows);

				$('.item-add').click(function(){
					var reader_id=$('input[name="reader_id"]').val();
					var reader_barcode=$('input[name="reader_barcode"]').val();
					var book_id=$(this).parent("td").data('id');
					var c_obj = $(this).parents("tr");
					$.ajax({
						url: "{{route('borrow.bookReturn')}}",
						type: 'post',
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						dataType: 'JSON',
						data:{
							reader_id:reader_id , 
							book_id:book_id , 
						},
					}).done(function (data) {
						if(data){
							c_obj.remove();
							ajax_get_reader(reader_barcode);
							alert('歸還成功');
						}else{
							alert('歸還失敗');
						}
					});
				});//end $('.item-add').click(function(){
			});
		});//end $('#book_barcode').change(function () { 


		function ajax_get_reader(reader_id)
		{
			$('.reader_barcode').children().remove();
			$('.borrow').children().remove();

			$.ajax({
				url: "{{route('borrow.getReader')}}",
				type: 'post',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				dataType: 'JSON',
				data:{reader_barcode:reader_id},
			}).done(function (data) {
				var reader_rows="";
				if(data['info']=='success'){
					$.each( data['reader'], function( key, value ) {
						//console.log(value['id']);
						reader_rows=reader_rows + '<div class="form-group"><label>姓名：' + value['name'] + '，</label></div>';
						reader_rows=reader_rows + '<div class="form-group"><label>電話：' + value['tel'] + '，</label></div>';
						reader_rows=reader_rows + '<div class="form-group"><label>手機：' + value['mobile'] + '，</label></div>';
						reader_rows=reader_rows + '<div class="form-group"><label>可借閱數量：' + value['borrow_book'] + '</label></div>';
						reader_rows=reader_rows + '<input id="reader_id" type="hidden" name="reader_id" value="'+ value['id'] +'"  />';
						reader_rows=reader_rows + '<input id="borrow_book" type="hidden" name="borrow_book" value="'+ value['borrow_book'] +'"  />';
						reader_rows=reader_rows + '<input id="reader_barcode" type="hidden" name="reader_barcode" value="'+ reader_id +'"  />';
					});
					
					var borrow_rows="";
					$.each( data['borrows'], function( key, value ) {
						borrow_rows=borrow_rows + '<tr>';
						borrow_rows=borrow_rows + '<td>' + value['name']  + '</td>';
						borrow_rows=borrow_rows + '<td>' + value['author']  + '</td>';
						borrow_rows=borrow_rows + '<td>' + value['borrow']  + '</td>';
						borrow_rows=borrow_rows + '<td>' + value['return']  + '</td>';
						borrow_rows=borrow_rows + '</tr>';
					});

					$('.reader_barcode').append(reader_rows);
					$('.borrow').append(borrow_rows);
				}
				if(data['message']){
					alert('ddd');
				}

			});
		}

	</script>
@endsection