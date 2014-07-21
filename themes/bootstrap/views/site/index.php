<?php
$this->pageTitle=Yii::app()->name;
?>

<div class="bpadb fs24">
    <?php
    if(!Yii::app()->user->isGuest)
         echo "Welcome, ". Yii::app()->user->name .". Now you can access search results.";
    else echo "Welcome, guest. Login to access search results";
    ?>
</div>

<form action="/site/search/">
    <div class="fields">
        <input type="text" name='q' class="form-control" placeholder="Enter your search request here">
        <input type="submit" class="btn btn-primary" value="Search">
    </div>
</form>