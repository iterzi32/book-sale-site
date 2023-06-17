<header>
    <nav class="navbar fixed-top  navbar-expand-lg bg-black">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="{{route('user.index')}}">Terzi Kitabevi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li>
                        <form action="{{route('search')}}" method="post" class="d-flex" role="search" autocomplete="off">
                            @csrf
                            <input class="form-control me-2" type="search" placeholder="Arama" aria-label="Search" name="key_word">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="container-fuild">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth()
                        <li class="px-2"><a href="{{route('cart.index')}}" class="btn btn-sm btn-light"><i class="fa fa-shopping-cart"></i> Sepet</a></li>
                        <li><a href="{{route('user.logout')}}" class="btn btn-sm btn-danger"><i class="fa fa-sign-out"></i> Çıkış</a></li>
                    @else
                        <li class="px-2"><a href="{{route('user.register')}}" class="btn btn-sm btn-success"><i class="fa fa-user-circle-o"></i> Kayıt</a></li>
                        <li><a href="{{route('user.login')}}" class="btn btn-sm btn-primary"><i class="fa fa-sign-in"></i> Giriş</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
<br><br><br><br>
