
@inject('role','App\Models\Role')
<?php
  $roles = $role->pluck('display_name','id')->toArray();
?>
              <div class="form-group">
                <label for="name">Name</label>
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
              </div>   
              <div class="form-group">
                <label for="email">Email</label>
                    {!! Form::email('email',null,['class'=>'form-control']) !!}
              </div> 
              <div class="form-group">
                <label for="phone">Phone</label>
                    {!! Form::text('phone',null,['class'=>'form-control']) !!}
              </div> 
              <div class="form-group">
                <label for="photo">Photo</label><br>
                    {!! Form::file('photo',null,['class'=>'form-control']) !!}
              </div> 
              <div class="form-group">
                <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" >
              </div> 
              <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
              </div> 
              <div class="form-group">
                <label for="roles_list">Rank The Users</label>
                  {!! Form::select('roles_list[]',$roles,null,[
                  'class'=>'form-control',
                  'multiple'=>'multiple'
                  ]) !!}
              </div>
              <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
