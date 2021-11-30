<div class="sidebar">
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-bar-32"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li @if ($pageSlug == 'organisations') class="active " @endif>
                <a href="/organisations">
                    <i class="tim-icons icon-single-02"></i>
                    <p>My Organisations</p>
                </a>
            </li>







        </ul>
    </div>
</div>
