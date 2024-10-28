<nav class="fixed-top navbar navbar-expand-lg bg-primary-color">
    <div class="justify-content-between d-flex">
        <div class="p-2">
          @yield('left-button')
        </div>

        <div class="p-2 text-neutral-light fw-bold">
            @yield('navbar-title')
        </div>

        <div class="p-2 mx-2 position-absolute end-0">
            @yield('right-button')
        </div>
    </div>
</nav>
