Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore

@dvvinfo
happyhaha
/
treasure-blog
12
4959
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
treasure-blog/modules/admin/views/comment/index.php /
@happyhaha
happyhaha finishing
Latest commit 8fbbbab on 8 Feb 2017
History
1 contributor
51 lines (43 sloc)  1.7 KB

Code navigation is available!
Navigate your code with ease. Click on function and method calls to jump to their definitions or references in the same repository. Learn more

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(!empty($comments)):?>

        <table class="table">
            <thead>
            <tr>
                <td>#</td>
                <td>Автор</td>
                <td>Текст</td>
                <td>Action</td>
            </tr>
            </thead>

            <tbody>
            <?php foreach($comments as $comment):?>
                <tr>
                    <td><?= $comment->id?></td>
                    <td><?= $comment->user->name?></td>
                    <td><?= $comment->text?></td>
                    <td>
                        <?php if($comment->isAllowed()):?>
                            <a class="btn btn-warning" href="<?= Url::toRoute(['comment/disallow', 'id'=>$comment->id]);?>">Запретить</a>
                        <?php else:?>
                            <a class="btn btn-success" href="<?= Url::toRoute(['comment/allow', 'id'=>$comment->id]);?>">Разрешить</a>
                        <?php endif?>
                        <a class="btn btn-danger" href="<?= Url::toRoute(['comment/delete', 'id' => $comment->id]); ?>">Удалить</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

    <?php endif;?>
</div>



