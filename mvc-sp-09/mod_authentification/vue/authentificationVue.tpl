<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../@ressources/template-modele/assets/css/normalize.css">
    <link rel="stylesheet" href="../@ressources/template-modele/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../@ressources/template-modele/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../@ressources/template-modele/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../@ressources/template-modele/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../@ressources/template-modele/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../@ressources/template-modele/assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Formulaire d'authentification employer Séraphin PARYS</div>
        <div {if AuthentificationTable::getMessageErreur() neq ''} class="alert alert-danger" role="alert" {/if}>
            {AuthentificationTable::getMessageErreur()}
        </div>
        <div class="card-body card-block">
            <form action="index.php" method="post" class="">
                <input type="hidden" class="form-control" name="gestion" value="authentification">
                <input type="hidden" class="form-control" name="action" value="{$action}">
                <div class="form-group">
                    <label><br></label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input type="text" id="username" name="login" placeholder="Identifiant" class="form-control"
                               value="{$unVendeur->getLogin()}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>

                        <input type="password" id="password" name="motdepasse" placeholder="Mot de passe"
                               class="form-control" value="">
                    </div>
                    <label><br></label>
                </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-success btn-flat m-b30 m-t-30">Connexion</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>