<?php
$this->pageTitle=Yii::app()->name . ' - Search results';
if(!isset($result)) $result=null;
?>

<div>
    <form action="/site/search/">
        <div class="input-group fields bpadb">
            <span class="input-group-addon">Search for:</span>
            <input type="text" name='q' class="form-control" value="<?=$q?>">
        </div>
    </form>

    <?php
        if(empty($result))
            echo "Nothing found ...<br />";
        else
            foreach($result as $item)
                echo "$item->id :: $item->email - $item->username <br />";
    ?>
</div>

