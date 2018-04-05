/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 03/04/2018
 * Time: 18:16
 */

<html>
    <head>
        <title>Blog - @yield('title')</title>
</head>
<body>
    @section('sidebar')
        This is the master sidebar.
    @show

    <div class="container">
        @yield('content')
    </div>
</body>
</html>