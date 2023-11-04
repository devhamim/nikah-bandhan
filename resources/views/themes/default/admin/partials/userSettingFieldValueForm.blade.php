<form class="form-inline" method="post" action="{{route('admin.userSettingFieldValueAddPost')}}">
              {{csrf_field()}}

              <div class="form-group {{ $errors->has('setting_field_name') ? ' has-error' : '' }}">
                <label for="setting_field_name">Field Name:</label>
                <select 
                name="setting_field_name" 
                class="form-control" 
                id="setting_field_name">

                <option value="">Select Field Name</option>
                @if (old('setting_field_name'))
                  <option selected>{{ old('setting_field_name') }}</option>
                @else
                  
                @endif
                  @foreach ($fields as $field)
                  @if ($field->title != old('setting_field_name'))
                    <option>{{ $field->title }}</option>
                  @endif
                  
                @endforeach
                </select>
                
                
                 
              </div>

              &nbsp; &nbsp;

              <div class="form-group {{ $errors->has('setting_field_value') ? ' has-error' : '' }}">
                <label for="setting_field_value">Field Value:</label>
                <input 
                type="text" 
                name="setting_field_value" 
                value="{{old('setting_field_value')}}" 
                placeholder="Field Name"
                style="width: 300px;" 
                class="form-control" 
                id="setting_field_value">
                @if ($errors->has('setting_field_value'))
                <span class="help-block">
                  <strong>{{ $errors->first('setting_field_value') }}</strong>
                </span>
                @endif
              </div>

              
              <button type="submit" class="btn btn-primary">Add</button>

            </form>