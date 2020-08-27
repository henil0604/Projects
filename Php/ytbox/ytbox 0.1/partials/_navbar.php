<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">YT bOx</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../home/">Home</a>
            </li>
        </ul>
        <?php
        if (isset($_SESSION['logintrace']) && $_SESSION['logintrace']) {
        ?>
            <form>
                <h5 class="text-muted">You Logged In</h5>
            </form>
        <?php
        } else {
        ?>
            <form>
                <a href="../accounts/signup/" class="btn btn-outline-success btn-sm">SignUp</a>
                <a href="../accounts/login/" class="btn btn-outline-primary btn-sm">Login</a>
            </form>
        <?php
        }
        ?>
    </div>
</nav>