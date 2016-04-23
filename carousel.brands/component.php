<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/*$arResult['NUMBER_CAROUSEL'] = date($arParams["NUMBER_CAROUSEL"]);*/

/*Получили $arParams["IBLOCK_ID"] айдишник инфоблока, далее нужно собрать картинки из элементов этого инфоблока
где VIEW_SLIDER_BRANDS = 1
поместить все в массив*/

$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);

$arPics = array();

$rsItems = CIBlockElement::GetList(
 Array("SORT"=>"ASC"),
 Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE"=>"Y", "PROPERTY_VIEW_SLIDER_BRANDS_VALUE" => "Да"),
 //Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE"=>"Y"),
 false,
 false,
 //Array("ID", "NAME", "PREVIEW_PICTURE", "PROPERTY_VIEW_SLIDER_BRANDS_VALUE", "PROPERTY_LINK_VALUE", "PROPERTY_OFF_LINK_VALUE")
 Array("ID", "CODE", "NAME", "PREVIEW_PICTURE", "PROPERTY_VIEW_SLIDER_BRANDS_VALUE", "PROPERTY_LINK", "PROPERTY_OFF_LINK")
 //Array("ID", "NAME", "PREVIEW_PICTURE")
 );

while($ob = $rsItems->GetNextElement()) // "бежим" по элементам
{
    $arFields[] = $ob->GetFields();  // $arFields массив значений полей текущего элемента

//    $props = $ob->GetProperties("MNOGEST");
//    echo "<pre>";
//    print_r($props);
//    echo "</pre>";


}
//echo "<pre>";
//print_r($arFields);
//echo "</pre>";

foreach($arFields as $slides)
{
    $slides["PREVIEW_PICTURE"] = CFile::GetFileArray($slides["PREVIEW_PICTURE"]);

    //$slides["LIST_NEWS_IL"] = CIBlock::GetProperties($arParams["IBLOCK_ID"], Array(), Array("CODE"=>"PROPERTY_MNOGEST"));
    //$slides["LIST_NEWS_IL"] = $slides['PROPERTIES']['PROPERTY_MNOGEST']['VALUE'];
    //$slides["iPROPERTY_OFF_LINK"] = CFile::GetFileArray($slides["PROPERTY_OFF_LINK_VALUE"]);

    $arFieldsc[] = $slides;
}

//echo "<pre>";
//print_r($arFieldsc);
//echo "</pre>";

$arResult["slideforbrand"] = $arFieldsc;

//echo "<pre>";
//print_r($arResult);
//echo "</pre>";

/*$arResult['PICT_CAROUSEL'] = $arParams["IBLOCK_ID"];*/
$this->IncludeComponentTemplate();
?>
