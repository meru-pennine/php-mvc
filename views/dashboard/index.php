
<?php ob_start(); ?>
    <div class="row">
        <!-- Boxes de Acoes -->
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="glyphicon glyphicon-retweet"></i></div>
                    <div class="info">
                        <h3 class="title">News</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.
                        </p>
                       
                        <a href="<?php echo BASE_URL ?>/news/" class="btn btn-default" title="Title Link">
                            Read More <i class="fa fa-angle-double-right"></i>
                        </a>
                       
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>
            
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="glyphicon glyphicon-retweet"></i></div>
                    <div class="info">
                        <h3 class="title">Top Headlines</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.
                        </p>
                       
                        <a href="<?php echo BASE_URL ?>/news/top-headline/" title="Title Link" class="btn btn-default">
                            Read More <i class="fa fa-angle-double-right"></i>
                        </a>
                        
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>
            
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="glyphicon glyphicon-book"></i></div>
                    <div class="info">
                        <h3 class="title">Books</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.
                        </p>
                        
                        <a href="<?php echo BASE_URL ?>/book/"  class="btn btn-default" title="Title Link">
                            Read More <i class="fa fa-angle-double-right"></i>
                        </a>
                        
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>          
        <!-- /Boxes de Acoes -->
    </div>
<?php 

$content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>

