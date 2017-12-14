{{ Form::open(['url' => '/dispatch', 'autocomplete' => 'off']) }}
{{-- Form::model($user, ['route' => ['user.update', $user->id]]) --}}
<div class="columns">
  <div class="column">
      {{ Form::label('client_id', 'Client', ['class' => 'label']) }}
      {{ Form::select('client_id', $clients, 0, ['placeholder' => 'Select Client']) }}
  </div>
  <div class="column">
      {{ Form::label('contact_id', 'Contact', ['class' => 'label']) }}
      {{ Form::select('contact_id', $contacts, 0, ['placeholder' => 'Select Contact']) }}
  </div>
  <div class="column">
      {{ Form::label('user_id', 'Supervisor', ['class' => 'label']) }}
      {{ Form::select('user_id', $supervisors, 0, ['placeholder' => 'Select Supervisor']) }}
  </div>
  <div class="column">
      {{ Form::label('task_id', 'Job Task', ['class' => 'label']) }}
      {{ Form::select('task_id', $tasks, 1, ['placeholder' => 'Select Job Task']) }}
  </div>
</div>
<div class="columns">
  <div class="column">
      {{ Form::label('work_order', 'Work Order', ['class' => 'label']) }}
      {{ Form::text('work_order', '', ['placeholder' => 'Work Order (if known)', 'class' => 'input']) }}
  </div>
  <div class="column">
      {{ Form::label('location', 'Location', ['class' => 'label']) }}
      {{ Form::text('location', '', ['placeholder' => 'Location (if known)', 'class' => 'input']) }}
  </div>
  <div class="column">
    {{ Form::label('start', 'Start Time', ['class' => 'label']) }}
    {{ Form::text('start', '', ['placeholder' => 'Start Date/Time', 'class' => 'input datetime']) }}
  </div>
  <div class="column">
    {{ Form::label('stop', 'End Time', ['class' => 'label']) }}
    {{ Form::text('stop', '', ['placeholder' => 'End Date/Time', 'class' => 'input datetime', 'disabled' => 'true']) }}
  </div>
</div>

@include('dispatch.partials.charges')

<div id="items" style="margin-bottom:24px">
    {{-- Populate Selection as Needed --}}
</div>
<nav class="level is-mobile">
  <div class="level-left">
    <div class="level-item">
       {{ Form::button('<span class="icon"><i class="fas fa-times"></i></span><span>Cancel</span>', ['class' => 'button is-light']) }}
    </div>
  </div>
  <div class="level-right">
    <div class="level-item">
      {{ Form::button('<span class="icon"><i class="fas fa-plus"></i></span><span>Post</span>', ['type' => 'submit', 'class' => 'button is-primary is-pulled-right']) }}
    </div>
  </div>
</nav>
{{ Form::close() }}
