  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index2.php">Mi portal wifi</a>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="#">
                <?php
                        $logged_user = $_SESSION['myusername'];
                        $credito = checkea_credito($logged_user);
                        if ($credito >= 15)
                        {
                                echo "Crédito: <span class=\"badge badge-success\">$credito min</span>";
                        } else {
                                echo "Crédito: <span class=\"badge badge-important\">$credito min</span>";
                        }
                ?>
                </a></li>
              <li><a href="account.php">Cuenta</a></li>
             <li><a href="logout.php">Desconectarse</a></li>
            </ul>
          </div><!--/.navbar-collapse -->
        </div>
      </div>
    </div>
  </body>
