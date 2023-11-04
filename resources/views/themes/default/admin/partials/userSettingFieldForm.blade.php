<form class="form-inline" method="post" action="{{route('admin.userSettingFieldAdd')}}">
              {{csrf_field()}}

              <div class="form-group {{ $errors->has('setting_field_name') ? ' has-error' : '' }}">
                <label for="setting_field_name">Field Name:</label>
                <input 
                type="text" 
                name="setting_field_name" 
                value="{{old('setting_field_name')}}" 
                placeholder="Field Name"
                style="width: 300px;" 
                class="form-control" 
                id="setting_field_name">
                @if ($errors->has('setting_field_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('setting_field_name') }}</strong>
                </span>
                @endif
              </div>

              
              <button type="submit" class="btn btn-primary">Add</button>

            </form>