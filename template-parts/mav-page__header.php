<header id="mavid-page-header" class="mav-page-header-wrapper">
    <!-- Featured Image -->
    <div class="mav-page-header-ctn" <?php mavf_post_thumbnail_url(); ?>>
    </div>
    <!-- Page Title -->
    <div id="mavid-sec-page-title" class="mav-page-title-wrapper" >
        <div class="mav-page-title-ctn" >
            <?php
            the_title('<h1 class="mav-page-title">', '</h1>');
            ?>
        </div>
    </div>
</header>