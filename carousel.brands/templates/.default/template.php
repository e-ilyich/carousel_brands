<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$APPLICATION->AddHeadScript($templateFolder."/js/jquery.CarouselLifeExample.js");
$APPLICATION->SetAdditionalCSS($templateFolder."/css/indexil.css");
?>

<style type="text/css">

    .carouselil {
        margin: 0;
        padding: 0;
        list-style: none;
        list-style-type: none;
    }

    .carouselil li {
        float: left;
        width: 150px;
        height: 70px;
        padding: 5px;
        list-style: none;
        list-style-type: none;
        display: inline-block;
    }

    .llpng {
        margin-top: -54px;
        position: absolute;
        cursor: pointer;
    }

    .rrpng {
        margin-left: 935px; /*700px*/
        float: left;
        margin-top: -54px;
        cursor: pointer;
    }
    .contil {
        margin-left: 52px;
    }

    /*#rollover {*/
        /*background: url(images/w2.png);*/
        /*display: block;*/
        /*width: 150px;*/
        /*height: 50px;*/
    /*}*/

    /*#rollover:hover {*/
        /*background-position: 0 -150px;*/

    .bwbl {
        /*-webkit-filter: grayscale(100%);*/
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        -o-filter: grayscale(100%);
        filter: grayscale(100%);
        /*filter: url(grayscale.svg); *//* Firefox 4+ */
        /*filter: gray; *//* IE 6-9 */
    }

    .bw {
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -ms-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .bw:hover {
        /*-webkit-filter: grayscale(0%);*/
        -webkit-filter: grayscale(0%);
        -moz-filter: grayscale(0%);
        -ms-filter: grayscale(0%);
        -o-filter: grayscale(0%);
        filter: grayscale(0%);
    }

</style>

<script type="text/javascript">
    $(document).ready(function() {
        $('.containeril').Carouselil({
            visible: 5, /*4*/
            rotateBy: 1,
            speed: 400,/*400*/
            btnNext: '#next',
            btnPrev: '#prev',
            auto: false, /*false*/
            backslide: true,/*true*/
            margin: 10
        });
    });
</script>

<?
//echo "<pre>";
//print_r($arResult);
//echo "</pre>";
?>

<script type="text/javascript">
    function ChangeImage(id,image)
    {
        var el=document.getElementById(id);
        el.src=image;
    }
</script>

<div class="contil">
    <div class="containeril">
        <ul class="carouselil">
            <?
            shuffle($arResult["slideforbrand"]);
            foreach($arResult["slideforbrand"] as $slide)
            {
                if (!empty($slide["PREVIEW_PICTURE"])){

                    $descrtext = $slide["PREVIEW_PICTURE"]["DESCRIPTION"];
                    $file = CFile::ResizeImageGet($slide["PREVIEW_PICTURE"], array('width'=>150, 'height'=>50), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    $img = '<img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" alt="'.$descrtext.'" title="'.$descrtext.'"'.'/>';
                    $slide["PREVIEW_PICTURE"] = $img;
                    $y = round((70 - $file["height"]) / 2);
                    if($y < 0){$y = 0;}
                ?>
                 <li>
                    <center><a href="/manufactures/<?=$slide["CODE"];?>/"><div class="bwbl bw" style="margin-top: <?=$y;?>px"><?=$slide["PREVIEW_PICTURE"];?></div></a></center>
                 </li>
                <?

                }
            }
            ?>
        </ul>
    </div>
</div>

<div class="llpng"><img id="prev" src="<?=$templateFolder?>/images/ll.png" onmouseover="ChangeImage('prev','<?=$templateFolder?>/images/ll_on.png')" onmouseout="ChangeImage('prev','<?=$templateFolder?>/images/ll.png')"></div>
<div class="rrpng"><img id="next" src="<?=$templateFolder?>/images/rr.png" onmouseover="ChangeImage('next','<?=$templateFolder?>/images/rr_on.png')" onmouseout="ChangeImage('next','<?=$templateFolder?>/images/rr.png')"></div>

<div id="console"></div>