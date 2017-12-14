<div class="columns is-hidden-touch has-text-centered">
    <div class="column column-label"><p class="label">Asset Name</p></div>
    <div class="column column-label"><p class="label">Asset Category</p></div>
    <div class="column column-label"><p class="label">Updated</p></div>
    <div class="column column-label is-1"><p class="label">Actions</p></div>
</div>
@foreach ($data as $item)
    <div class="columns box">
        <div class="column">
            <p>{{ $item->name }}</p>
        </div>
        <div class="column">
            <p>{{ $item->category->name }}</p>
        </div>
        <div class="column has-text-offwhite">
            <p>{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</p>
        </div>
        <div class="column is-narrow">
            <div class="field is-grouped is-pulled-right">
                <p class="control">
                    <a href="{{ url("asset/$item->id/edit") }}" type="button" class="has-text-link">
                        <span class="icon"><i class="fal fa-pencil fa-fw"></i></span>
                    </a>
                </p>
                <p class="control">
                    <a href="{{ url("asset/$item->id") }}" type="button" class="has-text-danger">
                        <span class="icon"><i class="fal fa-times fa-fw"></i></span>
                    </a>
                </p>
            </div>
        </div>
    </div>
@endforeach