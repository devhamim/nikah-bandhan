<form method="post" enctype="multipart/form-data" action="{{ route('admin.pageItemUpdate', $it) }}">

  @csrf


  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title">Item Title:</label>
    <input type="text" class="form-control" placeholder="Page Title" id="title" {{ $it->title == 'Register Domain Form
    part' ? ' readonly ' : ''}} name="title" value="{{ old('title') ?: $it->title }}">
  </div>


  <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description" class="control-label"> Description: <a class="btn btn-xs w3-deep-orange w3-btn"
        href="{{ route('admin.pageItemEditEditor', $it) }}"> {{ $it->editor ? 'Without Editor' : 'With Editor'
        }}</a></label>

    @if($it->editor ==1)
    <textarea name="description" class="form-control  {{ $it->editor ? ' details-input ' : '' }} " rows="10"
      id="summernote" placeholder="Description">{!! old('description') ?: $it->content  !!}</textarea>
    @else
    <textarea name="description" class="form-control" rows="10"
       placeholder="Description">{!! $it->content !!}</textarea>
    @endif

    @if ($errors->has('description'))
    <span class="help-block">
      <strong>{{ $errors->first('description') }}</strong>
    </span>
    @endif

  </div>

  <div class="checkbox">
    <label><input type="checkbox" {{$it->editor ? 'checked' : ''}} name="editor"> Editor</label>
  </div>

  <div class="checkbox">
    <label><input type="checkbox" {{$it->active ? 'checked' : ''}} name="active"> Active</label>
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@push('js')

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

@endpush
