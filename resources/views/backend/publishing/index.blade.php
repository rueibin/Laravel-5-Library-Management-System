@extends('layouts.fixed_sidebar')

@section('content')

<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h2>基本設定/出版社設定</h2>
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
									@permission('publishing-create')
										<a href="{{route('publishing.create')}}" class="btn btn-primary "> 新增 </a>
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
									<col style="width:5%">
                                    <col style="width:50%">
                                    <col style="width:25%">
                                    <col style="width:20%">
								</colgroup>
								<thead>
									<tr>
										<th>id</th>
                                        <th>出版社名稱</th>
                                        <th>建立時間</th>
                                        <th>操作</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($publishing as $v )
                                    <tr>
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->name}}</td>
                                        <td>{{$v->created_at}}</td>
                                        <td>
											@permission('publishing-edit')
                                            <a href="{{route('publishing.edit', $v->id )}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 編輯 </a>
											@endpermission
											@permission('publishing-delete')
											<form method="POST" action="{{route('publishing.destroy' , $v->id)}}" accept-charset="UTF-8" style="display:inline">
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
                             {{ $publishing->links() }}
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