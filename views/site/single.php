<?php

use app\models\ArticleTag;
use app\models\Tag;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <a href="<?=Url::toRoute(['site/view', 'id'=> $article->id])?>"><img src="<?=$article->getImage();?>" alt="<?= $article->title?>"></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?=Url::toRoute(['site/category', 'id'=> $article->category->id])?>"> <?= $article->category->title?></a></h6>

                            <h1 class="entry-title"><a href="<?=Url::toRoute(['site/view', 'id'=> $article->id])?>"><?= $article->title?></a></h1>


                        </header>
                        <div class="entry-content">
                            <p><?= $article->content?>
                            </p>


                        </div>
<!--                        <div class="decoration">-->
<!--                            --><?php //foreach ($tags as $tag):?>
<!--                            <a href="#" class="btn btn-default">--><?//=$tag->tag_article_artile_id?><!--</a>-->
<!--                            --><?php //endforeach;?>
<!--                            <a href="#" class="btn btn-default">Decoration</a>-->
<!--                        </div>-->

                        <div class="social-share">
							<span
                                class="social-share-title pull-left text-capitalize">By <?=$article->author->name?> On <?= $article->getDate();?></span>
                            <ul class="text-center pull-right">
<!--                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>-->
<!--                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>-->
                                <div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,telegram"></div>
                            </ul>
                        </div>
                    </div>
                </article>
<!--                <div class="top-comment">-->
<!--                    <img src="/public/images/comment.jpg" class="pull-left img-circle" alt="">-->
<!--                    <h4>Rubel Miah</h4>-->
<!---->
<!--                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor-->
<!--                        invidunt ut labore et dolore magna aliquyam erat.</p>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-md-6">-->
<!--                        <div class="single-blog-box">-->
<!--                            <a href="#">-->
<!--                                <img src="/public/images/blog-next.jpg" alt="">-->
<!---->
<!--                                <div class="overlay">-->
<!---->
<!--                                    <div class="promo-text">-->
<!--                                        <p><i class=" pull-left fa fa-angle-left"></i></p>-->
<!--                                        <h5>Rubel is doing Cherry theme</h5>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!---->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6">-->
<!--                        <div class="single-blog-box">-->
<!--                            <a href="#">-->
<!--                                <img src="/public/images/blog-next.jpg" alt="">-->
<!---->
<!--                                <div class="overlay">-->
<!--                                    <div class="promo-text">-->
<!--                                        <p><i class=" pull-right fa fa-angle-right"></i></p>-->
<!--                                        <h5>Rubel is doing Cherry theme</h5>-->
<!---->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="related-post-carousel">-->
<!--                    <div class="related-heading">-->
<!--                        <h4>You might also like</h4>-->
<!--                    </div>-->
<!--                    <div class="items">-->
<!--                        <div class="single-item">-->
<!--                            <a href="#">-->
<!--                                <img src="/public/images/related-post-1.jpg" alt="">-->
<!---->
<!--                                <p>Just Wondering at Beach</p>-->
<!--                            </a>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div class="single-item">-->
<!--                            <a href="#">-->
<!--                                <img src="/public/images/related-post-2.jpg" alt="">-->
<!---->
<!--                                <p>Just Wondering at Beach</p>-->
<!--                            </a>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div class="single-item">-->
<!--                            <a href="#">-->
<!--                                <img src="/public/images/related-post-3.jpg" alt="">-->
<!---->
<!--                                <p>Just Wondering at Beach</p>-->
<!--                            </a>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div class="single-item">-->
<!--                            <a href="#">-->
<!--                                <img src="/public/images/related-post-1.jpg" alt="">-->
<!---->
<!--                                <p>Just Wondering at Beach</p>-->
<!--                            </a>-->
<!--                        </div>-->
<!---->
<!--                        <div class="single-item">-->
<!--                            <a href="#">-->
<!--                                <img src="/public/images/related-post-2.jpg" alt="">-->
<!---->
<!--                                <p>Just Wondering at Beach</p>-->
<!--                            </a>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div class="single-item">-->
<!--                            <a href="#">-->
<!--                                <img src="/public/images/related-post-3.jpg" alt="">-->
<!---->
<!--                                <p>Just Wondering at Beach</p>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <?=$this->render('/inc/comment', [
                    'article' => $article,
                    'comments'=>$comments,
                    'commentForm'=>$commentForm
                ])?>
            </div>
            <?=$this->render('/inc/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>
        </div>
    </div>
</div>
<!-- end main content-->
