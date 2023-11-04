<form method="post" enctype="multipart/form-data" action="{{ route('admin.pageItemAddPost', $page) }}">

  @csrf


  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title">Item Title:</label>
    <input type="text" class="form-control" placeholder="Page Title" id="title" name="title" value="{{ old('title') }}">
  </div>


  <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description" class="control-label"> Description</label>




    <textarea name="description" class="form-control details-input" rows="10" id="description"
      placeholder="Description">{!! old('description')   !!}</textarea>

    @if ($errors->has('description'))
    <span class="help-block">
      <strong>{{ $errors->first('description') }}</strong>
    </span>
    @endif

  </div>






  <div class="text-right">
    <div class="checkbox">
      <label><input type="checkbox" checked name="editor"> Editor</label>
    </div>

    <div class="checkbox">
      <label><input type="checkbox" checked name="active"> Active</label>
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>


@push('js')

<script>
  $(function () {
    // alert("ok");
    // Summernote
    console.log($('#description').summernote());

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

@endpush