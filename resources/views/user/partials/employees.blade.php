<section class="section">
    <div class="container">
        <h1 class="box-title">
            <span class="icon is-medium"><i class="far fa-users fa-lg"></i></span>
            <span>Employees <span class="tag is-link has-text-weight-bold">{{ count($users) }}</span></span>
        </h1>
        <div class="columns has-text-centered">
            <div class="column column-label is-1 has-text-centered"><p class="label">#</p></div>
            <div class="column column-label"><p class="label">Name</p></div>
            <div class="column column-label is-1"><p class="label">License</p></div>
            <div class="column column-label"><p class="label">Phone</p></div>
            <div class="column column-label is-hidden-mobile"><p class="label">Email</p></div>
            <div class="column column-label is-1"><p class="label">Actions</p></div>
        </div>
        @php $count = 1; @endphp
        @foreach ($users as $user)
        <div class="columns box">
            <div class="column is-1 has-text-centered">
                {{ $count++ }}
            </div>
            <div class="column">
                {{ $user->name }}
            </div>
            <div class="column is-1">
                @if ($user->has_license)
                @if ($user->has_cdl)
                <span class="tag is-success">Class A</span>
                @else
                <span class="tag is-info">Class D</span>
                @endif
                @else
                <span class="tag is-danger">Can't Drive</span>
                @endif
            </div>
            <div class="column">
                {{ $user->phone }}
            </div>

            <div class="column is-hidden-mobile">
                {{ $user->email }}
            </div>
            <div class="column is-1">
                <div class="field is-grouped is-pulled-right">
                    <p class="control">
                        <a href="{{ url("user/edit/$user->id") }}" type="button" class="has-text-link">
                            <span class="icon"><i class="fal fa-pencil fa-fw"></i></span>
                        </a>
                    </p>
                    <p class="control">
                        <a href="{{ url("user/destroy/$user->id") }}" type="button" class="has-text-link">
                            <span class="icon"><i class="fal fa-times fa-fw"></i></span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>