<section class="section">
    <div class="container">
        <div class="columns is-hidden-touch has-text-centered">
            <div class="column column-label"><p class="label">Name</p></div>
            <div class="column column-label"><p class="label">Category</p></div>
            <div class="column column-label"><p class="label">Rate</p></div>
            <div class="column column-label"><p class="label">Type</p></div>
            <div class="column column-label"><p class="label">Updated</p></div>
            <div class="column column-label is-1"><p class="label">Actions</p></div>
        </div>
        @foreach ($data as $item)
            <div class="columns box">
                <div class="column">
                    <p>{{ $item->asset->name }}</p>
                </div>
                <div class="column">
                    <p>{{ $item->category->name }}</p>
                </div>
                <div class="column">
                    <p>{{ $item->rate }}</p>
                </div>
                <div class="column">
                    @switch($item->type)
                        @case(1)
                        <p>Hourly</p>
                        @break
                        @case(2)
                        <p>Daily</p>
                        @break
                        @case(3)
                        <p>Gallons</p>
                        @break
                        @case(4)
                        <p>Quantity</p>
                        @break
                        @case(5)
                        <p>At Cost (PO)</p>
                        @break
                    @endswitch
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
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>