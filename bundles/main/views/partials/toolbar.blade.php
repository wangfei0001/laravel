<div class="top-quickmenu">
    <ul class="nav">
        <li class="menu">所有分类<em></em>
            <?php

            if(!empty($this->categories)){
                ?>
                <ul>
                    <?php
                    foreach($this->categories as $key=>$category){
                        ?>
                        <li><a href="<?php //echo $this->url(array('controller'=>'category','action'=>'index','cat'=>$category['seo_name']),'category',false); ?>"><?php echo $category['name']?></a></li>

                        <?php
                    }
                    ?>

                </ul>
                <?php
            }
            ?>
        </li>
        <li><a href="">热图排行榜</a></li>
        <li><a href="<?php //echo $this->url(array('controller'=>'pin','action'=>'product'),'default',true);?>">热卖商品</a></li>
        <li><a href="">邀请朋友</a></li>
    </ul>
</div>
