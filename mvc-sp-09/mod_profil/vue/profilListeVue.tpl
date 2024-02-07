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
    <meta http-equiv="X-UA-Compatible" content={$titrePage}>
    <title>{$titrePrincipal}</title>
    <meta name="description" content="<!-- PLACER LE TITRE-->">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="public/favicon.ico">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="public/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="template/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="public/assets/scss/style.css">
    <link href="public/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
<!-- Left Panel -->


{include file='public/left.tpl'}

<!-- FIN : Left Panel -->


<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    {include file='public/header.tpl'}

    <!-- FIN : header -->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1><!-- PLACER LE SLOGAN--></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <!-- PLACER LE FIL D'ARIANE -->
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?gestion=profil">Profil</a></li>
                        <li class="active">{$titrePage}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-6">

                    <div {if ProfilTable::getMessageErreur() neq ''} class="alert alert-danger" role="alert" {/if}>
                        {ProfilTable::getMessageErreur()}
                    </div>
                    <div {if ProfilTable::getMessageSucces() neq ''} class="alert-success" role="alert" {/if}>
                        {ProfilTable::getMessageSucces()}
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{$titrePage}
                                <!-- PLACER LE FORMULAIRE D'AJOUT-->

                            </strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <form method="POST" action="index.php">
                                    <input type="hidden" name="gestion" value="profil">
                                    <input type="hidden" name="action" value="modifier">
                                    <input type="hidden" name="codev" value="{$profil->getCodev()}">

                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nom"><strong>Code
                                                    vendeur : </strong>{$profil->getCodev()}</label>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                   for="prenom"><strong>Prénom </strong></label>
                                            {$profil->getPrenom()}
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                   for="nom"><strong>Nom </strong></label>
                                            {$profil->getNom()}
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                   for="adresse"><strong>Adresse </strong></label>
                                            <input type="text" name="adresse" class="form-control"
                                                   value="{$profil->getAdresse()}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="cp"><strong>Code
                                                    postal </strong></label>
                                            <input type="text" name="cp" class="form-control"
                                                   value="{$profil->getCp()}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                   for="ville"><strong>Ville </strong></label>
                                            <input type="text" name="ville" class="form-control"
                                                   value="{$profil->getVille()}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                   for="telephone"><strong>Téléphone </strong></label>
                                            <input type="tel" name="telephone" class="form-control"
                                                   value="{$profil->getTelephone()}">
                                        </div>

                                        <div class="pos-actions">

                                            <input class="btn btn-submit float-right" type="submit"
                                                   name="btn_modifier"
                                                   value="Modifier">
                                        </div>
                                </form>


                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header"><strong>Statistiques</strong></div>
                    <div class="card-body">
                        <div class="form-group"><strong>Total des ventes : </strong>OUI</div>
                    </div>
                </div>
                <form method="POST" action="index.php">
                    <input type="hidden" name="gestion" value="profil">
                    <input type="hidden" name="action" value="valider">
                    <input type="hidden" name="codev" value="{$profil->getCodev()}">
                    <div class="card">
                        <div class="card-header"><strong>Changer de mot de passe</strong></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-control-label" for="login"><strong>Code
                                        vendeur : </strong></label> {$profil->getLogin()}

                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="motdepasse"><strong>Nouveau mot de
                                        passe </strong></label>
                                <input type="password" name="motdepasse" class="form-control"
                                       value="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="confirmation"><strong>Confirmer mot de
                                        passe </strong></label>
                                <input type="password" name="confirmation" class="form-control"
                                       value="">
                            </div>

                            <div class="pos-actions">

                                <input class="btn btn-submit float-right" type="submit" name="valider"
                                       value="Changer">

                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!- .animated -->

</div>
<!-- .content -->


</div><!-- /#right-panel -->


<script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="public/assets/js/plugins.js"></script>
<script src="public/assets/js/main.js"></script>


<script src="public/assets/js/lib/data-table/datatables.min.js"></script>
<script src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="public/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="public/assets/js/lib/data-table/jszip.min.js"></script>
<script src="public/assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="public/assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="public/assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="public/assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="public/assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="public/assets/js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>

</body>
</html>