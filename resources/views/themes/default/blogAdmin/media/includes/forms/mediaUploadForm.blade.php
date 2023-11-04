<form class="form-inline" method="post" action="{{route('admin.mediaUploadPost')}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-group {{ $errors->has('files') ? ' has-error' : '' }}">
        <label for="files">Upload One or Multiple Image:</label>
        <input type="file" name="files[]" value="{{old('files')}}" placeholder="File" class="form-control" id="files" style="padding-bottom: 32px;" multiple>
        @if ($errors->has('files'))
        <span class="help-block">
          <strong>{{ $errors->first('files') }}</strong>
        </span>
        @endif
      </div>

      
      <button type="submit" class="w3-btn w3-blue w3-round w3-border w3-border-white">Add Image</button>

    </form>