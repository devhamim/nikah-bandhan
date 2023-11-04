@extends('admin.master.dashboardmaster')
@push('css')

    <style type="text/css">
        .select2-dropdown .select2-search__field:focus,
        .select2-search--inline .select2-search__field:focus {
            outline: none !important;
            border: none !important;
        }

    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog <small>New</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item active">New</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>




    <section class="content">
        <div class="container-fluid">
            @include('alerts.alerts')
            <form method="post" action="{{ route('admin.postAddNewPost') }}" enctype="multipart/form-data">
                <div class="row">


                    {{ csrf_field() }}
                    <!-- left column -->
                    <div class="col-md-7">

                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        id="title" placeholder="Title of Post" autocomplete="off">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea name="description" class="form-control" rows="10" id="summernote"
                                        placeholder="Description">{!! old('description') !!}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Excerpt</label>
                                    <textarea name="excerpt" class="form-control" rows="3" id="excerpt"
                                        placeholder="Excerpt of Post">{{ old('excerpt') }}</textarea>

                                    @if ($errors->has('excerpt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('excerpt') }}</strong>
                                        </span>
                                    @endif

                                </div>



                            </div>
                        </div>






                        {{-- <div class="card card-primary">
                            <div class="card-body">

                                <div class="card card-success">

                                    <div class="card-body">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"><i class="fa fa-globe"></i> Add Division,
                                                District, Thana (উপজেলা)</h3>
                                        </div>

                                        <div class="form-group">
                                            <label for="extra_file" class="control-label"></label>

                                            <div class="radio">
                                                <label><input type="radio" name="division" value="no"> বিভাগ নেই</label>
                                            </div>
                                            @foreach ($divs as $div)
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="division" value="{{ $div->id }}"
                                                            {{ $div->hasPost($post) ? 'checked' : '' }} >
                                                            {{ $div->name }}
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>


                                        <div class="form-group">
                                            <label for="title" class="control-label">District </label>


                                            <select id="district" name="district"
                                                class="form-control select2-district select2-container step2-select select2"
                                                data-placeholder="Select District"
                                                data-ajax-url="{{ route('welcome.selectDistrictForPost') }}"
                                                data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200"
                                                style="width: 100%;">
                                                <option selected="selected">{{ old('district') }}</option>

                                            </select>
                                            <span class="help-block">At First Select Division.</span>

                                        </div>


                                        <div class="form-group">
                                            <label for="title" class="control-label">Thana (উপজেলা) </label>


                                            <select id="thana" name="thana"
                                                class="form-control select2-thana select2-container step2-select select2"
                                                data-placeholder="Select Thana"
                                                data-ajax-url="{{ route('welcome.selectThanaForPost') }}"
                                                data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200"
                                                style="width: 100%;">
                                                <option selected="selected">{{ old('thana') }}</option>

                                            </select>
                                            <span class="help-block">At First Select District.</span>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>



                            </div>
                        </div> --}}


                    </div>

                    <div class="col-md-5">

                        <div class="card card-success">

                            <div class="card-body">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="fa fa-globe"></i> Add Feature Image</h3>
                                </div>

                                <div class="form-group row {{ $errors->has('feature_image') ? ' has-error' : '' }}">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="feature_image" class="form-control" id="inputEmail3"
                                            placeholder="Email">
                                        <span class="help-block">Image Dimention 300px X 200px or larger and Ratio
                                            3/2.</span>

                                    </div>

                                    @if ($errors->has('feature_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('feature_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>


                        <div class="card card-primary">
                            <div class="card-body">

                                <div class="card card-success">

                                    <div class="card-body">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"><i class="fa fa-globe"></i> SEO Part</h3>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control"
                                                value="{{ old('meta_title') }}" id="meta_title"
                                                placeholder="Meta Title of Post" autocomplete="off">
                                            @if ($errors->has('meta_title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('meta_title') }}</strong>
                                                </span>
                                            @endif

                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Keywords</label>
                                            <input type="text" name="meta_keywords" class="form-control"
                                                value="{{ old('meta_keywords') }}" id="meta_keywords"
                                                placeholder="Meta Keywords of Post" autocomplete="off">
                                            @if ($errors->has('meta_keywords'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('meta_keywords') }}</strong>
                                                </span>
                                            @endif

                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Description</label>
                                            <textarea name="meta_description" class="form-control" rows="3"
                                                id="meta_description"
                                                placeholder="Meta Description of Post">{{ old('meta_description') }}</textarea>

                                            @if ($errors->has('meta_description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('meta_description') }}</strong>
                                                </span>
                                            @endif

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>



                            </div>
                        </div>


                        <div class="card card-success">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title" class=" control-label">Tags (For Search)</label>


                                    <select id="tags" name="tags[]"
                                        class="form-control select2-tags select2-container step2-select select2"
                                        data-placeholder="Select Tags From list or Add New"
                                        data-ajax-url="{{ route('welcome.selectTagsOrAddNew') }}" data-ajax-cache="true"
                                        data-ajax-dataType="json" data-ajax-delay="200" multiple="multiple"
                                        style="width: 100%;">
                                        @if (old('tags'))
                                            @foreach (old('tags') as $tagg)
                                                <option selected="selected">{{ $tagg }}</option>
                                            @endforeach
                                        @endif

                                    </select>

                                </div>







                                <div class="form-group">


                                    <div class="checkbox">
                                        <label><input type="checkbox" name="publish" checked>Publish Instantly</label>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="checkbox">
                                        <label><input type="checkbox" name="front_slider" checked>Front Slider</label>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="checkbox">
                                        <label><input type="checkbox" name="headline">Headline (Scrolling) </label>
                                    </div>

                                </div>
                            </div>
                        </div>






                        <div class="card card-success">

                            <div class="card-body">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Category</h3>
                                </div>
                                <div class="form-group">
                                    <label for="extra_file" class=" control-label"></label>

                                    @foreach ($cats->chunk(2) as $cats2)
                                        <div class="row">

                                            @foreach ($cats2 as $cat)
                                                <div class="col-sm-6">

                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="categories[]"
                                                                value="{{ $cat->id }}"
                                                                {{ $cat->hasPost($post) ? 'checked' : '' }}>{{ $cat->title }}</label>
                                                    </div>

                                                </div>

                                            @endforeach


                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>


                    </div>

                    <!--/.col (right) -->
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </section>

@endsection
@push('js')
    <script>

        $(document).ready(function() {
            $('.select2-tags').select2({

                minimumInputLength: 1,
                tags: true,
                tokenSeparators: [','],
                ajax: {

                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {

                        params.page = params.page || 1;
                        // alert(data[0].s);
                        var data = $.map(data, function(obj) {

                            obj.id = obj.id || obj.title;
                            return obj;
                        });
                        var data = $.map(data, function(obj) {
                            obj.text = obj.text || obj.title;
                            return obj;
                        });
                        return {
                            results: data,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    }
                },
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {

$('input[name="division"]').change(function(){
    $('.select2-district').select2({

minimumInputLength: 0,
ajax: {
    data: function(params) {
        return {
            q: params.term, // search term
            division: $('input[name=division]:checked').val(),
            page: params.page
        };
    },
    processResults: function(data, params) {
        params.page = params.page || 1;

        var data = $.map(data, function(obj) {
            obj.id = obj.id || obj.district;
            return obj;
        });
        var data = $.map(data, function(obj) {
            obj.text = obj.text || obj.district;
            return obj;
        });
        return {
            results: data,
            pagination: {
                more: (params.page * 30) < data.total_count
            }
        };
    }
},
});
});


$(".select2-district").change(function(){
    $('.select2-thana').select2({
                minimumInputLength: 0,
                ajax: {
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            district: $('.select2-district').val(),
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        // alert(data[0].s);
                        var data = $.map(data, function(obj) {
                            obj.id = obj.id || obj.thana;
                            return obj;
                        });
                        var data = $.map(data, function(obj) {
                            obj.text = obj.text || obj.thana;
                            return obj;
                        });
                        return {
                            results: data,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    }
                },
            });
});


        });
    </script>
@endpush
