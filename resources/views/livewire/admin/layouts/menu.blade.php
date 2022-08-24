<nav class="fixed top-0 z-30 w-full h-20 shadow-sm bg-celeste-40 sm:h-24 ">

    <!--Logo-->
    <div class="flex flex-wrap items-center">
        <div class="flex justify-center flex-shrink md:w-1/3 md:justify-start text-branco">
            <a href=" {{ route('front.shop') }} ">
                <span class="pl-2 text-xl italic">Supreme</span>
            </a>
        </div>

        <!--Menus-->
        <div class="flex flex-row pt-2 md:w-1/3 md:justify-end">

                <div class="right-0 row text-branco">
                    <div class="col-md-8">
                        <div class="right-0 card">

                            <div class="right-0 card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @can('isAdmin')
                                    <div class="btn btn-success btn-lg">
                                      You have Admin Access
                                    </div>
                                @elsecan('isManager')
                                    <div class="btn btn-primary btn-lg">
                                      You have Manager Access
                                    </div>
                                @else
                                    <div class="btn btn-info btn-lg">
                                      You have User Access
                                    </div>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>



        </div>


        </div>


</nav>
