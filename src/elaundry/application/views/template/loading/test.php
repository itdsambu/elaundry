<div class="preloader">
    <div class="loading">
        <img src="<?php echo base_url(); ?>assets/gif/laundry-icons-square3.gif" width="80">
        <p>Harap Tunggu</p>
    </div>
</div>

<h1>Halaman Berhasil di load</h1>

<style type="text/css">
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }
    .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font: 14px arial;
    }
</style>

<script src="<?php echo base_url(); ?>assets/jQuery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".preloader").fadeOut(1000);
    });
</script>