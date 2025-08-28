<div class="page-header d-print-none" aria-label="Page header">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">@yield('pretitle')</div>
                <h2 class="page-title">@yield('title')</h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    @yield('action')
                </div>
            </div>
        </div>
    </div>
</div>
