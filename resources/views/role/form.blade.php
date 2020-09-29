@inject('perm','App\Models\Permission')
   
        <div class="form-group">
          <label for="name">Name</label>
              {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div> 
        <div class="form-group">
          <label for="display_name">Display name</label>
              {!! Form::text('display_name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          <label for="description">Description</label>
              {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          <label for="permission_list">Permission List</label>
          <div class="row">
            @foreach($perm->all() as $permission)
              <div class="col-sm-3">
                <label>
                  <input type="checkbox" name="permissions_list[]" value="{{$permission->id}}" 
                    @if ($model->hasPermission($permission->name))
                          checked
                      @endif > 

                    {{$permission->display_name}} 
                    
                </label>
              </div>
            @endforeach
          </div> 
        </div>  
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
 
          
          