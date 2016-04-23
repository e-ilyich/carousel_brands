<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 
$arComponentDescription = array(
                                "NAME" => GetMessage('Карусель брэндов'),
                                "DESCRIPTION" => GetMessage("Выводим карусель брэндов"),
                                "ICON" => "/images/carousel.gif",
                                "PATH" => array(
                                                "ID" => "aura_components",
                                                "CHILD" => array(
                                                                 "ID" => "carouselbrands",
                                                                 "NAME" => "Карусель брэндов"
                                                                )
                                               ),
                                );
?>