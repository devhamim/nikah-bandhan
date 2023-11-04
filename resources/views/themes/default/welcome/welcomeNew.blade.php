@extends('welcome.layouts.welcomeMasterNew')

@push('css') 



@endpush

@section('content')

@include('welcome.parts.welcomeNewPart')

@endsection

@push('js') 




<script type="text/javascript">
  $(document).ready(function(){


    $(document).on('change', '.change-with-other', function(e){
      // e.preventDefault();
      // alert('ok');      
      var that = $(this);
      var val = that.val();
      if((val == 'Other') || (val == 'Others'))
      {
        that.closest('.other-area').find('.other-value-field').slideDown();
      }
      else
      {
        that.closest('.other-area').find('.other-value-field').slideUp();
      }
    });

    // var iii = 1;
    // $(document).on('click', '.signup-post-btn', function(e){
    //     var that = $(this);
    //     if(iii > 1)
    //     {
    //       that.attr('type', 'button');
    //       // alert('ok');
    //     }
    //     iii++; 
    // });

  });
</script>

@endpush
