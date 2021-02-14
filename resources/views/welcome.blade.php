<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->


    <link rel="stylesheet" href="css/app.css">
    <!-- Bootstrap js -->
    <script src="js/app.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

    <title>INVENTORY</title>
    <style></style>
</head>
<body>

<section id="header">
    <nav class="navbar navbar-expand-sm fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex" href="#">
                <div><img src="images/invent.png" alt="logo" class="pr-1" /></div>

                <div class="p-l2 pt-3">
              <span _ngcontent-serverapp-c117=""  class="ml-2 "
              >All Inventory</span
              >
                </div>
            </a>
            @if (Route::has('login'))
                <ul class="nav navbar-nav float-md-right">
                    @auth
                        <li><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                        @if (Route::has('register'))
                            <li><a class="nav-link" href="{{ route('register') }}">Sign up</a></li>
                        @endif
                    @endauth
                </ul>
            @endif

        </div>
    </nav>
</section>
<div class="jumbotron text-center">
    <div class="intro">
        <h1>WELCOME TO ALL IN ONE INVENTORY </br> MANAGEMENT SYSTEM</h1>
    </div>
</div>
<div class="container-fluid">
    <table class ="font-weight-bold text-dark">
        <tbody>
        <tr>
            <td> <a  href="/">About Us</a></td>
        </tr>
        <tr>
            <td><a  href="/">
                    Terms and Conditions
                </a> </td>
        </tr>
        <tr>
            <td> <a  href="/">Privacy Policy</a></td>
        </tr>
        <tr>
            <td> <a  href="/">Contuct Us</a><td>
        </tr>

        </tbody>
    </table>

</div>
<hr/>
<div class = "container-fluid">
    <div class="container">
        <span>&#169; <small>Invntory management system</small></span>

    </div>
</div>
</body>
</body>
</html>
