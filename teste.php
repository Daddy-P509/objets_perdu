<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./MDB5/css/mdb.min.css">
    <title>Z-Index</title>
</head>
<body>
    
    <style>
        header {
            position: fixed !important;
            width: 100% !important;
            background-color: #d1d1d1;
        }
        
        body{
            background-color: #d9d9d9;

        }

        .cotent { 
            background: lightgray;
            width: 80%;
            margin: 0 auto;
            height: 1000px;
   
            display: flex;
            padding: 10px;
            justify-content: space-between;
            align-items: stretch;

        }

        .cotent p {
            text-align: center;
            font-size: 20px;
        }

        .box-orange {
            background: orange;
            width: 20%;
            height: 464px;
            flex-shrink: 0;
            z-index: var(--zi-dropdown);
            box-shadow: 0 0 0 hsl(210deg 8% 5% / 5%);
            transition: box-shadow ease-in-out .1s,transform ease-in-out .1s;
            transform: translateZ(0);
        }

        .box-blue {
            background: lightblue;
            width: 60%;
            height: 100px;
        }

        .sticky {
            position: sticky;
            /* background: red; */
            top: 0;
            padding: 10px;
            color: white;
        }


        
    </style>
    
    <header>
        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid justify-content-between">
                <!-- Left elements -->
                <div class="d-flex">
                <!-- Brand -->
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="#">
                    <img
                    src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
                    height="20"
                    alt="MDB Logo"
                    loading="lazy"
                    style="margin-top: 2px;"
                    />
                </a>

                <!-- Search form -->
                <form class="input-group w-auto my-auto d-none d-sm-flex">
                    <input
                    autocomplete="off"
                    type="search"
                    class="form-control rounded"
                    placeholder="Search"
                    style="min-width: 125px;"
                    />
                    <span class="input-group-text border-0 d-none d-lg-flex"
                    ><i class="fas fa-search"></i
                    ></span>
                </form>
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <ul class="navbar-nav flex-row d-none d-md-flex">
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="#">
                    <span><i class="fas fa-home fa-lg"></i></span>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                    <span><i class="fas fa-flag fa-lg"></i></span>
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                    <span><i class="fas fa-video fa-lg"></i></span>
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                    <span><i class="fas fa-shopping-bag fa-lg"></i></span>
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                    <span><i class="fas fa-users fa-lg"></i></span>
                    <span class="badge rounded-pill badge-notification bg-danger">2</span>
                    </a>
                </li>
                </ul>
                <!-- Center elements -->

                <!-- Right elements -->
                <ul class="navbar-nav flex-row">
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link d-sm-flex align-items-sm-center" href="#">
                    <img
                        src="https://mdbcdn.b-cdn.net/img/new/avatars/1.webp"
                        class="rounded-circle"
                        height="22"
                        alt="Black and White Portrait of a Man"
                        loading="lazy"
                    />
                    <strong class="d-none d-sm-block ms-1">John</strong>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                    <span><i class="fas fa-plus-circle fa-lg"></i></span>
                    </a>
                </li>
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a
                    class="nav-link dropdown-toggle hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                    >
                    <i class="fas fa-comments fa-lg"></i>

                    <span class="badge rounded-pill badge-notification bg-danger">6</span>
                    </a>
                    <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuLink"
                    >
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a
                    class="nav-link dropdown-toggle hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                    >
                    <i class="fas fa-bell fa-lg"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">12</span>
                    </a>
                    <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuLink"
                    >
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a
                    class="nav-link dropdown-toggle hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                    >
                    <i class="fas fa-chevron-circle-down fa-lg"></i>
                    </a>
                    <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuLink"
                    >
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                    </ul>
                </li>
                </ul>
                <!-- Right elements -->
            </div>
        </nav>
        <!-- Navbar -->

    </header>

    <br><br><br><br><br>

    <div class="container">
        <div class="cotent">
            <div class="box-blue">
                <p>Scroll down the page</p>
                <hr>
            </div>

            <div class="box-orange">
                <p class="sticky">I am sticky</p>
            </div>
            
        </div>
    </div>

</body>
</html>