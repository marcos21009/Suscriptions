<header>

    <!-- header contend -->
    <div class="stripe">
      <div class="date text-right text-capitalize">
        {{strftime("%B %d, %G")}}
      </div>
    </div>
    <div class="header-contend text-center py-3">
      <img src="{{app('Modules\Setting\Contracts\Setting')->get("isite::logo1")}}" alt="">
    </div>

</header>
