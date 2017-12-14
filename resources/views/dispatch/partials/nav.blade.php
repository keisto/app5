<div class="container is-fluid">
    <div class="columns">
        <div class="column">
          <a href="{{ url("dispatch/date/$prevDay") }}" type="button" class="button is-small is-text has-text-link">
              <span class="icon"><i class="fas fa-arrow-left"></i></span><span>Day</span>
          </a>
          <a href="{{ url("dispatch/date/$prevWeek") }}" type="button" class="button is-small is-text has-text-link">
              <span class="icon"><i class="fas fa-arrow-left"></i></span><span>Week</span>
          </a>
          <a href="{{ url("dispatch/date/$prevMonth") }}" type="button" class="button is-small is-text has-text-link">
              <span class="icon"><i class="fas fa-arrow-left"></i></span><span>Month</span>
          </a>
        </div>
        <div class="column has-text-centered">
            <a href="{{ url("dispatch/date/$prevDay") }}" type="button" class="button is-small is-text has-text-link">
                 <span class="icon"><i class="fas fa-calendar-alt"></i></span><span>Go to Date</span>
            </a>
            <a href="{{ url("dispatch/date/$today") }}" type="button" class="button is-small is-text has-text-link">
                 <span class="icon"><i class="fas fa-calendar"></i></span><span>Today</span>
            </a>
            <a href="{{ url("dispatch/create") }}" type="button" class="button is-small is-text has-text-link">
                <span class="icon"><i class="fas fa-plus"></i></span><span>New Job</span>
            </a>
        </div>
        <div class="column has-text-right">
            <a href="{{ url("dispatch/date/$nextMonth") }}" type="button" class="button is-small is-text has-text-link">
                <span class="icon"><i class="fas fa-arrow-right"></i></span><span>Month</span>
            </a>
            <a href="{{ url("dispatch/date/$nextWeek") }}" type="button" class="button is-small is-text has-text-link">
                <span class="icon"><i class="fas fa-arrow-right"></i></span><span>Week</span>
            </a>
            <a href="{{ url("dispatch/date/$nextDay") }}" type="button" class="button is-small is-text has-text-link">
                <span class="icon"><i class="fas fa-arrow-right"></i></span><span>Day</span>
            </a>
        </div>
    </div>
</div>
