<head>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Gupter&display=swap" rel="stylesheet">
</head>


<div id="viewport">
    <!-- Sidebar -->
    <div id="sidebar">
        <header>
            <a href="#">Employer</a>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-stacked">
                        <div class="dropdown">
                            <button class="dropbtn">Espace Moderateur</button>
                            <div class="dropdown-content">
                                <a href="{{route('employer')}}">Employers</a>
                                <a href="{{route('vudeconges')}}">Conges</a>
                                <a href="{{route('vupointages')}}">Pointage</a>
                                <a href="{{route('dpt')}}">Departement</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div id="content">
        <nav class="navbar navbar-default">
            <div class="container-fluid voire">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#"><i class="zmdi zmdi-notifications text-danger">

                        </i>
                        </a>
                    </li>
                    <li><a href="#">Compte employer</a></li>

                </ul>
                <strong><a href="deconnexion">Deconnexion</a></strong>
            </div>
        </nav>
        <div class="container">
            @yield('moderator')
        </div>
        <div class="footer">

        </div>
    </div>
</div>
