<?php
$articleLink = 'https://habr.com/ru/post/44098/'; //ссылка на статью
$articleText = file_get_contents('article.txt'); //читаем статью из файла
$aclean = preg_replace('/[\x00-\x1F\x7F]/u', '', $articleText); //убираем лишние символы
$articlePreview = mb_substr($aclean, 0, 200)."..."; //обрезаем текст статьи до 200 символов и добавляем в конце многоточие

$words = explode(' ',$articlePreview); //разбиваем строку
//Далее делаем многоточие и три последних слова гиперссылкой на статью
$co = count($words);
    foreach ($words as $key => $word) {
    if($key == $co-3)
    echo '<a href="'.$articleLink.'">';
    if($key == $co-1)
    echo $word;
    else
    echo $word.' ';
    if($key == $co-1)
    echo '<a>';
    }
?>
