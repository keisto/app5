<div class="field is-grouped is-pulled-right">
    <p class="control">
        <a href="{{ url("dispatch/edit/") }}" type="button" class="has-text-link">
            <span class="icon"><i class="fal fa-thumbs-up fa-fw"></i></span>
        </a>
    </p>
    <p class="control">
        <a href="{{ url("dispatch/edit/") }}" type="button" class="has-text-link">
            <span class="icon"><i class="fal fa-pencil fa-fw"></i></span>
        </a>
    </p>

    <div class="dropdown is-hoverable is-right">
        <div class="dropdown-trigger">
            <a class="is-text has-text-link" aria-haspopup="true" aria-controls="dropdown-menu4">
                <span class="icon"><i class="fal fa-ellipsis-v fa-fw"></i></span>
            </a>
        </div>
        <div class="dropdown-menu" id="dropdown-menu4" role="menu">
            <div class="dropdown-content has-text-centered">
                <a href="#" class="dropdown-item has-text-danger">
                    <span class="icon"><i class="fal fa-times"></i></span> Void
                </a>
            </div>
        </div>
    </div>
</div>