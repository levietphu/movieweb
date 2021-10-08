@extends('backend.layout.layout')
@section('title', 'Thêm mới phim')
@section('text', 'Thêm mới phim')
@section('text1', 'phim')
@section('content')
<div class="row fix-row mt-20">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{route('movie.store')}}" method="POST" role="form">	
					@csrf
					<div class="row">
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Tên thay thế</label>
							<input type="text" class="form-control" name="substitute_name">
							@error('substitute_name')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Tên phim</label>
							<input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug()">
							@error('name')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>	
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Slug</label>
							<input type="text" class="form-control" id="slug" name="slug">
							@error('slug')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Kiểu</label>
							<select name="type" class="form-control select-2">
								<option value="">Tùy chọn</option>
								<option value="1">Phim bộ</option>
								<option value="0">Phim lẻ</option>
							</select>
							@error('type')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Trạng thái</label>
							<select name="status" class="form-control select-2">
								<option value="">Tùy chọn</option>
								<option value="0">Đang ra</option>
								<option value="1">Đã full</option>
							</select>
							@error('status')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Năm phát hành</label>
							<select name="id_release_time" class="form-control select-2">
								<option value="">Tùy chọn</option>
								@foreach($release as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
							@error('id_release_time')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Quốc gia</label>
							<select name="id_national" class="form-control select-2">
								<option value="">Tùy chọn</option>
								@foreach($national as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
							@error('id_national')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>	
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Seri Phim</label>
							<select name="id_seri" class="form-control select-2">
								<option value="">Tùy chọn</option>
								@foreach($seri as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
							
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Thể loại</label>
							<select name="id_cate[]" class="form-control select-2" multiple="">
								<option value="">Tùy chọn</option>
								@foreach($cate as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
							@error('id_cate')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Dịch và chất lượng</label>
							<select name="id_tran[]" class="form-control select-2" multiple="">
								<option value="">Tùy chọn</option>
								@foreach($translate as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
							@error('id_tran')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Diễn viên</label>
							<select name="id_actor[]" class="form-control select-2" multiple="">
								<option value="">Tùy chọn</option>
								@foreach($actor as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
							@error('id_actor')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Đạo diễn</label>
							<input type="text" class="form-control" name="director">
							
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Điểm IMDb</label>
							<input type="text" class="form-control" name="IMDb">
							
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Tổng số tập</label>
							<input type="text" class="form-control" name="all_episode">
						</div>
						<div class="form-group col-xs-12 col-sm-12 col-md-3">
							<label for="">Thời lượng phim</label>
							<input type="text" class="form-control" name="movie_duration">
							@error('movie_duration')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-3">
							<input type="hidden" name="image" id="image" class="form-control" value="">
							<a class="btn btn-primary" data-toggle="modal" href='#modal-image' style="margin-top: 25px;">Ảnh</a>
							
							<img src="" alt="" width="100" id="img_image" style="display: block;">
							@error('image')
							    <div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-xs-6 col-sm-6 col-md-12">
							<label for="">Nội dung phim</label>
							<textarea name="content" id="content" class="form-control" rows="3" required="required"></textarea>
							@error('content')
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

{{-- Sự kiện upload ảnh --}}
<div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document" >
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Quản lý upload file</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe src="{{url('filemanager')}}/dialog.php?type=1&field_id=image" class="upload-image" style="width: 100%;height: 400px"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
