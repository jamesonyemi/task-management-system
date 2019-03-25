<div id="change_teamLead" style="background-color: #1d2b36; border-radius: 5px;">
{{-- <form> --}}
{{ csrf_field() }}
<div class="card-block">
    <div class="card-text">
     <div class="row match-height">
        <div class="col-md-12">
            <div class="card row" style="background-color: #1d2b36;">
                <div class="card-body collapse in">
                  <div class="card-block">
                     <div class="card-text"> 
                        </div>
                            <div class="form-body">
                               <div class="form-group">
                                    {{-- {!! Form::hidden('user_id', '', array('placeholder' => 'Assigned by', 'id'=>'user_id','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Assigned By"')) !!} --}}
                                </div>    
                                <div class="row" style="margin: 0 20% 0 20%;">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <h4>
                                            <label for="donationinput4" style="color: white">Team Lead</label>
                                        </h4>
                                    <select class="form-control" id="assigned_to" name="assigned_to" >
                                    @foreach ($change_teamLead as $key => $teamlead)
                                    
                                        <option value="{{ $key }}" {{ old('assigned_to',) }}>
                                                {{ $teamlead }}
                                            </option>
                                    @endforeach
                                   </select>
                                   {!! $errors->first('assigned_to', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="cancel">
                    <div class="form-group">
                        <a> 
                        <button type="button" class="btn btn-warning mr-1 pull-left" >
                           <i class="icon-cross2" ></i> Cancel
                        </button>
                        </a>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group">
                        <button type="submit" name="submit" id="save" class="btn btn-primary">
                            <i class="icon-check2"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </form> --}}
</div>
<div id="throbber" 
style="display:none; position:relative; opacity:0.6;">
    <img src="{{ asset('app-assets/images/ico/loader.gif') }}" alt="loader.gif" />    
</div>
