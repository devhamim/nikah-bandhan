@extends('admin.master.dashboardmaster')
@push('css')

      <style type="text/css">
    .select2-dropdown .select2-search__field:focus, .select2-search--inline .select2-search__field:focus {
        outline: none !important;
        border: none !important;
      }
  </style>
@endpush

@section('content')
  @include('blogAdmin.posts.parts.postAddNew')
@endsection


@push('js')
<script src="{{asset('cp/bower_components/ckeditor/ckeditor.js')}}"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('description');
  });

  $(document).ready(function () {
  $('.select2-tags').select2({
    minimumInputLength: 1,
    tags:true,
    tokenSeparators: [','],
    ajax: {
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        params.page = params.page || 1;
        // alert(data[0].s);
        var data = $.map(data, function (obj) {
          obj.id = obj.id || obj.title;
          return obj;
        });
        var data = $.map(data, function (obj) {
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

  //////////////////




  $(document).on('click','#btn-feature',function(e){
      e.preventDefault();
      $('#my_feature_img').click();
    });
});


</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.select2-district').select2({
      minimumInputLength: 0,
      ajax: {
        data: function (params) {
          return {
            q: params.term, // search term
            division: $('input[name=division]:checked').val(),
            page: params.page
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 1;
          // alert(data[0].s);
          var data = $.map(data, function (obj) {
            obj.id = obj.id || obj.district;
            return obj;
          });
          var data = $.map(data, function (obj) {
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


  $('.select2-thana').select2({
      minimumInputLength: 0,
      ajax: {
        data: function (params) {
          return {
            q: params.term, // search term
            district: $('.select2-district').val(),
            page: params.page
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 1;
          // alert(data[0].s);
          var data = $.map(data, function (obj) {
            obj.id = obj.id || obj.thana;
            return obj;
          });
          var data = $.map(data, function (obj) {
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
</script>
@endpush
