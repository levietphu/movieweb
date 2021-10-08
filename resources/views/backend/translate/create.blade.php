@extends('backend.layout.layout')
@section('title', 'Thêm mới dịch và chất lượng')
@section('text', 'Thêm mới dịch và chất lượng')
@section('text1', 'dịch và chất lượng')
@section('content')
<div class="row fix-row mt-20">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{route('translate.store')}}" method="POST" role="form">	
					@csrf
					<div class="row">
						<div class="form-group col-xs-12 col-sm-12 col-md-6">
							<label for="">Tên dịch và chất lượng</label>
							<input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug()">
							@error('name')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>	
						<div class="form-group col-xs-12 col-sm-12 col-md-6">
							<label for="">Slug</label>
							<input type="text" class="form-control" id="slug" name="slug">
							@error('slug')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-6">
							<label for="">Type</label>
							<select name="type" class="form-control select-2">
								<option value="">Tùy chọn</option>
								<option value="0">Dịch</option>
								<option value="1">Chất lượng</option>
							</select>
							@error('type')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-6">
							<label for="">Trạng thái</label>
							<div class="radio">
								<label>
									<input type="radio" name="status" id="input" value="1" checked="checked">
									Hiện
								</label>
								<label>
									<input type="radio" name="status" id="input" value="0">
									Ẩn
								</label>
							</div>
							@error('status')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>						
					</div>								
					<button type="submit" class="btn btn-primary">Thêm mới</button>
				</form>				
			</div>
		</div>
	</div>
</div>
@endsection
