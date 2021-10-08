<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{url('public/backend')}}/js/jquery.min.js"></script>
    <script src="{{url('public/backend')}}/js/popper.min.js"></script>
    <script src="{{url('public/backend')}}/js/bootstrap.min.js"></script>
    <!--plugins-->
    <script src="{{url('public/backend')}}/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{url('public/backend')}}/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{url('public/backend')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!-- Vector map JavaScript -->
    <script src="{{url('public/backend')}}/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{url('public/backend')}}/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{url('public/backend')}}/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
    <script src="{{url('public/backend')}}/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="{{url('public/backend')}}/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="{{url('public/backend')}}/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
    <script src="{{url('public/backend')}}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="{{url('public/backend')}}/js/index2.js"></script>
    <!-- App JS -->
    <script src="{{url('public/backend')}}/js/app.js"></script>
    {{-- JS của đường dẫn đẹp(slug) --}}
    <script src="{{ url('public/backend') }}/js/slug.js"></script>
    {{-- js của đơn vị tồn kho (sku) --}}
    <script src="{{ url('public/backend') }}/js/sku.js"></script>
    {{-- js của attr phần màu sắc --}}
    <script src="{{ url('public/backend') }}/js/attr.js"></script>
    {{-- nhúng ckeditor --}}
    <script type="text/javascript" src="{{ url('public/backend') }}/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' ,{
            filebrowserBrowseUrl : '{{url('filemanager')}}/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserUploadUrl : '{{url('filemanager')}}/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserImageBrowseUrl : '{{url('filemanager')}}/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
        });
    </script>
    <!-- nhúng datatables -->
    <script type="text/javascript" charset="utf8" src="{{ url('public/backend') }}/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
    {{-- Sự kiện modal image của product --}}
    <script src="{{ url('public/backend') }}/js/modal_image.js"></script>
    <script src="{{ url('public/backend') }}/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select-2').select2();
        });
    </script>