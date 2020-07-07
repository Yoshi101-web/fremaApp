
<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand mr-lg-5" href="{{ url('/') }}">
            FreeMa
        </a>
        <form method="GET" action="/">
            <div class="input-group input-group-md ml-lg-5 col-sm-30">
                <input type="text" class="form-control" name="keyword" value="@if (isset( $keyword )) {{$keyword}}  @endif">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-outline-dark">検索</button>
                </span>
            </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                ログアウト
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class=" w-100 d-flex  bg-white shadow-sm">
        <div class="dropdown">
            <!-- 切替ボタンの設定 -->
            <button type="button" class="ml-3 ml-md-5 px-5 btn btn-outline-dark" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                カテゴリー
            </button>
            <!-- ドロップメニューの設定 -->
            <div class="dropdown-menu ml-3 ml-md-5" aria-labelledby="dropdownMenuButton">
                <div class="dropdown dropright">
                    <button type="button" class="dropdown-item" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        テスト
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">メニュー2</a>
                        <a class="dropdown-item" href="#">メニュー3</a>
                    </div>
                </div>
                <a class="dropdown-item" href="#">メニュー2</a>
                <a class="dropdown-item" href="#">メニュー3</a>
            </div><!-- /.dropdown-menu -->
        </div>
        <div class="dropdown">
            <!-- 切替ボタンの設定 -->
            <button type="button" class="px-5 btn btn-outline-dark" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ブランド
            </button>
            <!-- ドロップメニューの設定 -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">メニュー1</a>
                <a class="dropdown-item" href="#">メニュー2</a>
                <a class="dropdown-item" href="#">メニュー3</a>
            </div><!-- /.dropdown-menu -->
        </div>
    </div>