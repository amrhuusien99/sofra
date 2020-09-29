@inject('cities','App\Models\City')

              <div class="form-group">
                <label for="name">Name</label>
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
              </div> 
              <div class="form-group" >
                <label for="city_id">City</label>
                      {!! Form::select('city_id',$cities->pluck('name','id')->toArray(),null, [
                        'class'=>'form-control'
                      ])!!}
                </div>  
              <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
