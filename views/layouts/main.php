<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\TipoControlador;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>


<?php 
    $menu=[];
    $tipocontrolador = TipoControlador::find()->all();
    foreach ($tipocontrolador as $tipo) {
        
        $items =[];
        foreach ($tipo->controladores as $controlador) {
            $items[]=['label'=>ucfirst ($controlador->controlador_nombre), 'url'=>[$controlador->controlador_nombre.'/index']];
        }
        $menu[] = [ 'label'=> $tipo->tipo_controlador_nombre,'items'=>$items];

        
    }

?>
<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'C4i Sinaloa',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar'],
                'items' => [
                                ['label'=>'Permisos', 'items'=>[
                                                                    ['label'=>'Usuarios','url' =>['usuario/index']],
                                                                    ['label'=>'Bitacora','url' =>['bitacora/index']],
                                                                    ['label'=>'Grupos','url' =>['grupo/index']],
                                                                    ['label'=>'Acciones','url' =>['accion/index']],
                                                        ]],

                                ['label'=>'Ubicaciones', 'items'=>[
                                                                    ['label'=>'Colonias','url' =>['colonia/index']],
                                                                    ['label'=>'Lugares','url' =>['lugar/index']],
                                                                    ['label'=>'Municipios','url' =>['municipio/index']],
                                                                    ['label'=>'Poblaciones','url' =>['poblacion/index']],
                                                                    ['label'=>'Sindicaturas','url' =>['sindicatura/index']],
                                                                    ['label'=>'Tipo de Lugar','url' =>['tipo-lugar/index']],
                                                                    ['label'=>'Zonas','url' =>['zona/index']],
                                                        ]],
                                ['label'=>'Catalogos', 'items'=>[
                                                                    ['label'=>'Tipo de Incidente','url' =>['clase-incidente/index']],
                                                                    ['label'=>'Detalle de Incidente','url' =>['subclase-incidente/index']],
                                                                    ['label'=>'Detalle de Incidente 2','url' =>['subclase2-incidente/index']],
                                                        ]],  

                                ['label'=>'Incidentes', 'items'=>[
                                                                    ['label'=>'Incidentes','url' =>['incidente/index']],
                                                        ]],                                                                                                               
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
