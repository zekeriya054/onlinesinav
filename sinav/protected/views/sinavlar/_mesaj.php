<script>
$(document).ready(function() {
    $('#yw0').hide();
});
</script>
<div class="row-fluid">
<h3><?php echo $sinav_adi;?> </h3>


    <div class="row-fluid">
    <span class="span-5">

            <?php echo $mesaj;?>

    </span>

    </div>
         <?php
         echo '<a class="btn btn-primary btn-lg active" href="index.php?r=sinavlar/sinavbasla&id='.$id.'" role="button">Sınava Başla</a>';
         ?>
</span>

