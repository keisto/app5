<aside class="menu is-hidden-touch">
    <div id="logo" style="padding: 20px" class="has-text-centered">
        <img src="{{ asset('img/titan_brand_logo_white.svg') }}" style="height: 60px" onclick="toggleNavigation()">
        <h4 class="title has-text-white is-bold">TITAN</h4>
        {{--<img src="{{ asset('img/titan_brand.svg') }}">--}}
    </div>
    {{--<p class="menu-label has-text-light">--}}
        {{--Hello <span class="has-text-success">{{ Auth::user()->name }}</span>--}}
    {{--</p>--}}
    <ul class="menu-list"">
        <li id="dashboard">
            <a class="is-paddingless" href="/dashboard">
                <span class="icon is-large"><i class="fal fa-tachometer fa-lg"></i></span>
                <span>Dashboard</span>
            </a>
        </li>
        <li id="dispatch">
            <a class="is-paddingless" href="/dispatch">
                <span class="icon is-large"><i class="fal fa-truck fa-lg"></i></span>
                <span>Dispatch</span>
            </a>
        </li>
        <li id="ticket">
            <a class="is-paddingless"  href="/ticket">
                <span class="icon is-large"><i class="fal fa-file-alt fa-lg"></i></span>
                <span>Tickets</span>
            </a>
        </li>
        <li id="requests">
            <a class="is-paddingless"  href="/request">
                <span class="icon is-large"><i class="fal fa-clipboard fa-lg"></i></span>
                <span>Requests</span>
                {{--<span class="badge is-badge-info" data-badge="">Requests</span>--}}

            </a>
        </li>
        <li id="purchase-orders">
            <a class="is-paddingless"  href="/po">
                <span class="icon is-large"><i class="fal fa-tag fa-lg"></i></span>
                <span>Purchase Orders</span>
            </a>
        </li>
        <li id="employees">
            <a class="is-paddingless"  href="/user">
                <span class="icon is-large"><i class="fal fa-users fa-lg"></i></span>
                <span>Employees</span>
            </a>
        </li>
        <li id="assets">
            <a class="is-paddingless"  href="/asset">
                <span class="icon is-large"><i class="fal fa-database fa-lg"></i></span>
                <span>Assets</span>
            </a>
        </li>
        <li id="rates">
            <a class="is-paddingless"  href="/rate">
                <span class="icon is-large"><i class="fal fa-usd-circle fa-lg"></i></span>
                <span>Rates</span>
            </a>
        </li>
        <li id="clients">
            <a class="is-paddingless"  href="/client">
                <span class="icon is-large"><i class="fal fa-industry-alt fa-lg"></i></span>
                <span>Clients</span>
            </a>
        </li>
        <li id="settings">
            <a class="is-paddingless"  href="/client">
                <span class="icon is-large"><i class="fal fa-cog fa-lg"></i></span>
                <span>Settings</span>
            </a>
        </li>
    </ul>

</aside>