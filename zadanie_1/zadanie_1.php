<?php
$articleLink = 'https://habr.com/ru/post/44098/'; //������ �� ������
$articleText = file_get_contents('article.txt'); //������ ������ �� �����
$aclean = preg_replace('/[\x00-\x1F\x7F]/u', '', $articleText); //������� ������ �������
$articlePreview = mb_substr($aclean, 0, 200)."..."; //�������� ����� ������ �� 200 �������� � ��������� � ����� ����������

$words = explode(' ',$articlePreview); //���������� ������
//����� ������ ���������� � ��� ��������� ����� ������������ �� ������
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