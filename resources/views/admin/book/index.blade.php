@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Danh sách</span></h1> <a class="btn btn-success btn-flat" href="{{ route('create-book') }}"><i class="ti-plus"></i> Tạo mới</a>
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
                    <div class="card-title">
                        Tìm kiếm
                    </div>
                    <div class="card-body">
                        <form action="{{ route('list-book') }}" class="my-search-form">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tên sách</label>
                                        <input type="text" name="name" value="{{ isset($req['name']) && $req['name'] != '' ? $req['name'] : '' }}" class="form-control input-default">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary"><i class="ti-search icon-white"></i>&nbsp;&nbsp;OK</button>
                                        <a type="button" href="{{ route('list-book') }}" class="btn btn-default"></i>&nbsp;&nbsp;RESET</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-title">
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="w-5">STT</th>
                                        <th class="w-10">Ảnh</th>
                                        <th class="w-25">Tên</th>
                                        <th class="w-20">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $item)
                                        <tr>
                                            <td scope="row">{{ $key + 1}}</td>
                                            <td><img style="max-height: 200px;" src="{{ getImage($item->image) }}" /></td>
                                            <td >
                                                <strong>
                                                    <a href="{{ route('edit-book', ['id' => $item->id]) }}" style="color:#5873fe;">{{ $item->name }}</a>
                                                </strong>
                                            </td>
                                            <td class="color-primary">
                                                <a type="button" href="{{ route('edit-book', ['id' => $item->id]) }}" class="btn btn-primary btn-flat my-list-btn"><i class="ti-pencil icon-white"></i></a>
                                                <button type="button" class="btn btn-danger btn-flat m-l-5 my-list-btn" onclick="deleteRow('{{ $item->id }}', '/book/delete-row')"><i class="ti-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                        {{ $list->links() }}
            </div>
        </div>
        <!-- /# row -->
    </section>
</div>
<script type="text/javascript">
    
    let url = window.location.origin;

    // Bind options into Region
    let initCountryId = $('#selectCountry').val();
    ajaxGetRegionByCountry(initCountryId);

    $('#selectCountry').change(function (){
        let countryId = $(this).val();
        ajaxGetRegionByCountry(countryId);
    });

    function ajaxGetRegionByCountry(countryId) {
        
        let url = window.location.origin;
        if (countryId != '') {
            $.ajax({
                url: url + '/sb-admin/region/get-by-country',
                method: 'GET',
                data: {
                    countryId: countryId
                },
                success: function (res) {
                    let data = res.data;
                    let old = "{{ isset($req['region']) && $req['region'] ? $req['region'] : '' }}";
                    console.log(old);
                    $('#selectRegion').html('<option value="">Tất cả</option>');
                    $.each(data, function(key, value){
                        if (old == key) {
                            $('#selectRegion').append('<option value="' + key + '" selected>' + value + '</option>');
                        } else {
                            $('#selectRegion').append('<option value="' + key + '" >' + value + '</option>');
                        }
                    });
                },
                error: function (error) {}
            });
        } else {
            $('#selectRegion').html('<option value="">Tất cả</option>');
        }
    }
</script>
@endsection
