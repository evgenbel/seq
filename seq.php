<?php
/**
 * Created by PhpStorm.
 * User: Evgen
 * Date: 05.01.2017
 * Time: 17:33
 */


if (!isset($argv[1])){
    echo "������� ������������������ ����� ����� ����� ������� \n";
    exit;
}

$seq = explode(",", $argv[1]);
$seq = array_map("intval", $seq);
if (count($seq)<3){
    echo "��, ����� ������������������ �� ������ ����������. \n";
    exit;
}
$last_a = 0;
$last_b = 0;
$a = 0;
$b = 1;
for($i=2;$i<count($seq); $i++){
    if ($seq[$i-1]-$seq[$i-2]==0 && $last_a>0){
        echo "���, ����� ������������������ �� ����������. \n";
        exit;
    }elseif($seq[$i-1]-$seq[$i-2]==0){
        continue;
    }
    $a = ($seq[$i]-$seq[$i-1])/($seq[$i-1]-$seq[$i-2]);
    $b = $seq[$i-1]-$a*$seq[$i-2];
    if (
        ($last_a>0 && $last_a!=$a) ||
        ($last_b>0 && $last_b!=$b)
    ){
        echo "���, ����� ������������������ �� ����������. \n";
        exit;
    }
}
if ($a>=0 && $b==1){
    echo "��� �������������� ���������� � ����� {$a}. \n";
}elseif($b!=1 && $a==0){
    echo "��� �������������� ���������� � ������������� {$b}. \n";
}else{
    echo "������ ��� �� ����������, �� ���� ����� � �������� ������������ {$b} � ����� {$a}. \n";
}
