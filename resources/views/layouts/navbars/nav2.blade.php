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

            <li @if ($pageSlug == 'products') class="active " @endif>
                <a href="/stock/products/">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p>My Jobs</p>
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
                            <a href="/cart/">
                                <i class="tim-icons icon-cart"></i>
                                <p>Job Application</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'stockhistory') class="active " @endif>
                            <a href="/stock_history/">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>Download Bulk Resumes</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>



        </ul>
    </div>
</div>
