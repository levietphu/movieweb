@extends('backend.layout.layout')
@section('title', 'Sửa tập phim')
@section('text', 'Sửa tập phim')
@section('text1', 'Tập phim')
@section('content')
<div class="row fix-row mt-20">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{route('episode.update',[$id_movie,$edit->id])}}" method="POST" role="form">
					@csrf
					<div class="row">
						<div class="form-group col-xs-12 col-sm-12 col-md-4">
							<label for="">Mô tả</label>
							<input type="text" class="form-control" placeholder="vd: tập 1" name="description_name">
							@error('description_name')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-4">
							<label for="">Tên tập phim</label>
							<input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug()" value="{{$edit->name}}">
							@error('name')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>	
						<div class="form-group col-xs-12 col-sm-12 col-md-4">
							<label for="">Slug</label>
							<input type="text" class="form-control" id="slug" name="slug" value="{{$edit->slug}}">
							@error('slug')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-4">
							<label for="">Dịch</label>
							<select name="id_tran" class="form-control select-2">
								<option value="">Tùy chọn</option>
								@foreach($tran as $value)
								<option value="{{$value->id}}" {{$value->id==$edit->id_tran?'selected':''}}>{{$value->name}}</option>
								@endforeach
							</select>
							@error('id_tran')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-4">
							<label for="">Đường dẫn</label>
							<input type="text" class="form-control" name="link" value="{{$edit->link}}">
							@error('link')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-4">
							<label for="">Trạng thái</label>
							<div class="radio">
								<label>
									<input type="radio" name="status" id="input" value="1" {{$edit->status==1?'checked':''}}>
									Hiện
								</label>
								<label>
									<input type="radio" name="status" id="input" value="0" {{$edit->status==0?'checked':''}}>
									Ẩn
								</label>
							</div>
							@error('status')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>						
					</div>								
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</form>				
			</div>
		</div>
	</div>
</div>
@endsection
