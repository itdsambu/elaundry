<!-- BEGIN INNER FOOTER -->
<?php
$parse    = base_url();
$pieces   = explode("/", $parse);

// print_r($pieces); die(); 
?>

<div class="page-footer">
    <!-- <div class="container"> 2021 &copy; <?php echo base_url()?> -->
    <div class="container-fluid"> <?php echo date('Y') ?> &copy; <?php echo $pieces[3]; ?>
        <a target="_blank" href="#">| PT PULAU SAMBU</a>
        <!-- <a target="_blank" href="http://medabot.online/portfolio">Medabot</a> -->
    </div>
</div>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END INNER FOOTER -->