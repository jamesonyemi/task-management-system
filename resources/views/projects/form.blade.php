
<div class="form-group {{ $errors->has('project_name') ? 'has-error' : '' }}">
    <label for="project_name" class="col-md-2 control-label">Project Name</label>
    <div class="col-md-10">
        <input class="form-control" name="project_name" type="text" id="project_name" value="{{ old('project_name', isset($project->project_name) ? $project->project_name : null) }}" minlength="1" placeholder="Enter project name here...">
        {!! $errors->first('project_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', isset($project->description) ? $project->description : null) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', isset($project->status) ? $project->status : null) }}" minlength="1" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('assigned_by') ? 'has-error' : '' }}">
    <label for="assigned_by" class="col-md-2 control-label">Assigned By</label>
    <div class="col-md-10">
        <select class="form-control" id="assigned_by" name="assigned_by" required="true">
        	    <option value="" style="display: none;" {{ old('assigned_by', isset($project->assigned_by) ? $project->assigned_by : '') == '' ? 'selected' : '' }} disabled selected>Select assigned by</option>
        	@foreach ($assignedBies as $key => $assignedBy)
			    <option value="{{ $key }}" {{ old('assigned_by', isset($project->assigned_by) ? $project->assigned_by : null) == $key ? 'selected' : '' }}>
			    	{{ $assignedBy }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('assigned_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('assignee') ? 'has-error' : '' }}">
    <label for="assignee" class="col-md-2 control-label">Assignee</label>
    <div class="col-md-10">
        <input class="form-control" name="assignee" type="text" id="assignee" value="{{ old('assignee', isset($project->assignee) ? $project->assignee : null) }}" minlength="1" placeholder="Enter assignee here...">
        {!! $errors->first('assignee', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('priority') ? 'has-error' : '' }}">
    <label for="priority" class="col-md-2 control-label">Priority</label>
    <div class="col-md-10">
        <input class="form-control" name="priority" type="text" id="priority" value="{{ old('priority', isset($project->priority) ? $project->priority : null) }}" minlength="1" placeholder="Enter priority here...">
        {!! $errors->first('priority', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('watchers') ? 'has-error' : '' }}">
    <label for="watchers" class="col-md-2 control-label">Watchers</label>
    <div class="col-md-10">
        <input class="form-control" name="watchers" type="text" id="watchers" value="{{ old('watchers', isset($project->watchers) ? $project->watchers : null) }}" minlength="1" placeholder="Enter watchers here...">
        {!! $errors->first('watchers', '<p class="help-block">:message</p>') !!}
    </div>
</div>

