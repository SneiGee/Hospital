<nav class="navbar navbar-default navbar-fixed-top" id="main-navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="Toggle-navigation"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="" class="navbar-brand" style="color: #fff">
               <?php
                    $query = "SELECT * FROM systemsettings";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo $row['systemName'];
                        // or Select show System Logo
                        //if ($row['systemLogo'] == "") {
                        //    echo "<div class='SystemLogo'><img src='uploads/".$row['systemLogo']." width='20' height='20'></div>";
                        //}
                    }

                ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="" style="color:#fff">Pharmacist Panel</a></li>
                <li class="dropdown">
                    <a href="#" style="color:#fff" class="dropdown-toggle" data-toggle="dropdown" id="menu1">Account <i class="caret"></i></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="pharmacist_profile.php"><i class="fa fa-user"></i> Profile</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>