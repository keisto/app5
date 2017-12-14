{{ Form::open(['url' => '/timeoff']) }}
<div class="columns is-mobile">
    <div class="column is-12">
      {{ Form::label('reason', 'Reason', ['class' => 'label']) }}
      {{ Form::text('reason', '', ['placeholder' => 'Reason - Personal/Vacation/Appointment etc.', 'class' => 'input']) }}
    </div>
</div>
<div class="columns">
    <div class="column is-one-third">
      {{ Form::label('start', 'Start', ['class' => 'label']) }}
      {{ Form::text('start', '', ['placeholder' => 'Start', 'class' => 'input requestStart', 'id' => 'start']) }}
    </div>
    <div class="column is-one-third">
      {{ Form::label('stop', 'End', ['class' => 'label']) }}
      {{ Form::text('stop', '', ['placeholder' => 'End', 'class' => 'input requestEnd', 'id' => 'stop']) }}
    </div>
    <div class="column is-one-third">
        {{ Form::label('return', 'Ready to work on', ['class' => 'label']) }}
        {{ Form::text('return', '', ['placeholder' => 'Returning on', 'class' => 'input readonly is-static returnDate', 'readonly' => 'true']) }}
    </div>
</div>

<nav class="level is-mobile">
  <div class="level-left">
    <div class="level-item">
       {{ Form::button('<span class="icon"><i class="fas fa-times"></i></span><span>Cancel</span>', ['class' => 'button is-light']) }}
    </div>
  </div>
  <div class="level-rigth">
    <div class="level-item">
      {{ Form::button('<span class="icon"><i class="fas fa-paper-plane"></i></span><span>Submit</span>', ['type' => 'submit', 'class' => 'button is-primary is-pulled-right']) }}
    </div>
  </div>
</nav>
{{ Form::close() }}
