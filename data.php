<?php
require_once('musicList.php');

$twinkleNight = new musicList(
  'twinkle night',
  'somunia,nyankobrqとのユニット曲',
  '<iframe width="300" height="200" src="https://www.youtube.com/embed/uUvthLpSHrQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
  'Youtubeで100万回再生を突破していて
yacaを知らない人も知っているかも？<br>好きな相手に対して一喜一憂し、
もどかしい恋愛を体験してるような曲'
);

$dontCare = new musicList(
  'Don\'t care',
  '某有名RPGをテーマとした曲
',
  '<iframe width="300" height="200" src="https://www.youtube.com/embed/2hw2YUiQx-k" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
  '回復役目線で作曲されていて
ゲームをやっていればよくわかる<br>
状況を歌詞にしている個人的に好きな楽曲'
);
$transparentSunday = new musicList(
  '透明な日曜日',
  'Live配信でMonsterZ MATEと作成した楽曲',
  '<iframe width="300" height="200" src="https://www.youtube.com/embed/HWiyRHY-UsU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
  '1週間に起こった日常を歌詞にした曲で
心地よさのレベルがMAX<br>
まったりしたいときに聞きたい1曲'
);
$fruityLuv = new musicList(
  'fruity luv',
  'テンション上げたいならこれしかない',
  '<iframe width="300" height="200" src="https://www.youtube.com/embed/Gpmpt0D-wmo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
  '2年前に投稿された曲で
今では珍しいハイテンポの楽曲<br>
とりあえず、他の曲とは曲調が違って
いるが、歌詞を聞いてみるとワニの曲<br>
とりあえず迷ったらこれを聞いてみてほしい
'
);

$musicArray = array($twinkleNight, $dontCare, $transparentSunday, $fruityLuv);
