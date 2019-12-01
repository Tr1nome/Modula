<header class="container-fluid">
    <div class="row connexion">
        <div class="col-12 col-sm-8">
            
                <?php
                if (($identifiant && $identifiant !== 'admin') || ($password && $password !== 'admin')
                ) { ?>
                    <div class="col alert alert-danger">
                        Mauvais nom d'utilisateur ou mot de passe !
                    </div>
                <?php
                }
                ?>
               <!-- <form class="col mb-3" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Identifiant</label>
                        <input name="identifiant" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="identifiant">
                        <small id="emailHelp" class="form-text text-muted">Nous ne diffusons pas votre email aux des tiers.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                    </div>

                    <button type="submit" class="btn btn-warning">Se connecter</button>
                </form>-->
            
        </div>
        <div style="display:flex;justify-content:center; align-items:center;margin-top:50px;" class="container">

            <div class="jumbotron">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    

                    <h5>Espace administrateur</h5>
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="identifiant" name="identifiant" value="" required="required" autocomplete="username">
                        
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required="required" autocomplete="current-password">
                    </div>
                    <button type="submit" class="btn btn-warning">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</header>
