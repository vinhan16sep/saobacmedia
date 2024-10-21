@extends('admin.layouts.app')

@section('content')
<style>
    .my-preview {
        position: relative;
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 10px;
        height: 280px !important;
    }
    .my-preview img {
        max-height: 250px; 
        max-width: -webkit-fill-available;
    }
    .close:before {
        content: '✕';
    }
    .close {
        position: absolute;
        top: 3px;
        right: 5px;
        cursor: pointer;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Cập nhật</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.layouts.flash-message')
                <div class="card">
                    <div class="card-body offset-1 col-lg-10">
                        <div class="basic-form">
                            <form role="form" method="POST" action="{{ route('update-book', ['id' => $object->id, 'callback' => $callback]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <!-- Ảnh -->
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label>Ảnh <span class="my-required">*</span></label>
                                            <input type="file" name="image" class="form-control input-default" id="image">
                                            @if ($errors->has('image'))
                                                <span style="color:red;">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-preview">
                                        <img id="preview-image-before-upload" src="{{ asset('images/no-image-available.png') }}"
                                            alt="preview image" style="max-height: 250px;">
                                    </div>
                                </div>

                                <!-- Tên sách -->
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Tên sách <span class="my-required">*</span></label>
                                    <input type="text" name="name" value="{{ old('name', $object->name) }}" class="form-control" id="inputName" maxlength="255">
                                    @if ($errors->has('name'))
                                        <span style="color:red;">{{ $errors->first('name') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <!-- Slug -->
                                <div class="form-group">
                                    <label>Slug <span class="my-required">*</span></label>
                                    <input type="text" name="slug" value="{{ old('slug', $object->slug) }}" class="form-control" id="inputSlug" readonly="">
                                    @if ($errors->has('slug'))
                                        <span style="color:red;">{{ $errors->first('slug') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <!-- Tác giả -->
                                <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                                    <label>Tác giả <span class="my-required">*</span></label>
                                    <input type="text" name="author" value="{{ old('author', $object->author) }}" class="form-control" id="inputAuthor" maxlength="255">
                                    @if ($errors->has('author'))
                                        <span style="color:red;">{{ $errors->first('author') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <!-- Năm -->
                                <div class="form-group{{ $errors->has('published_year') ? ' has-error' : '' }}">
                                    <label>Năm xuất bản <span class="my-required">*</span></label>
                                    <input type="text" name="published_year" value="{{ old('published_year', $object->published_year) }}" class="form-control" maxlength="4">
                                    @if ($errors->has('published_year'))
                                        <span style="color:red;">{{ $errors->first('published_year') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <!-- Mô tả -->
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control my-textarea" rows="5">{{ old('description', $object->description) }}</textarea>
                                </div>

                                <!-- Nội dung -->
                                <div class="form-group">
                                    <label for="content" class="form-label">Thông số kỹ thuật</label>
                                    <textarea name="content" class="form-control my-textarea" id="txtareaContent">{{ old('content', $object->content) }}</textarea>
                                </div>

                                <input type="hidden" id="deleted_image" name="deleted_image" value="">
                                <a type="button" href="{{ url(URL::previous()) }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
                                <button type="submit" class="btn btn-primary"><i class="ti-save icon-white"></i>&nbsp;&nbsp;Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# column -->
        </div>
    </section>
</div>
<script src="{{ asset('admin/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    
    let url = window.location.origin;

    tinymce.init({
        selector: 'textarea.my-textarea',
        height: 500,
        plugins: [
            'image',
            'table'
        ],

        image_title : true,
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/sb-admin/upload/post-tinymce-image');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help'
    });
    
    $('#preview-image-before-upload').attr('src', "{{ $object->image ? asset($object->image) : asset('images/no-image-available.png') }}"); 

    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#preview-image-before-upload').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });

    $('.close').on('click', function() {
        $(this).parent('div').remove();
    });

    $('#inputName').change(function (){
        let slug = to_slug($('#inputName').val());
        $('#inputSlug').val(slug);
    });
    $('#inputName').focusout(function (){
        let slug = to_slug($('#inputName').val());
        $('#inputSlug').val(slug);
    });

</script>
@endsection
