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



            <li>
                <a data-toggle="collapse" href="#transactions" {{ $section == 'transactions' ? 'aria-expanded=true' : '' }}>
                    <i class="tim-icons icon-bank" ></i>
                    <span class="nav-link-text">Helpers</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse {{ $section == 'transactions' ? 'show' : '' }}" id="transactions">
                    <ul class="nav pl-4">
{{--                        <li @if ($pageSlug == 'payments') class="active " @endif>--}}
{{--                            <a href="/payments/{{$StockId}}/">--}}
{{--                                <i class="tim-icons icon-chart-pie-36"></i>--}}
{{--                                <p>Make Payment</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li @if ($pageSlug == 'cart') class="active " @endif>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>



                    </ul>
                </div>
            </li>



        </ul>
    </div>
</div>
