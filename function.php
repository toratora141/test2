<?php
function h($str)
{
  if (is_array($str)) {
    return array_map('h', $str);
  } else {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
}
function checkInput($inputText)
{
  if (is_array($inputText)) {
    return array_map('checkInput', $inputText);
  } else {
    if (preg_match('/\0/', $inputText)) {
      die('不正な入力です。');
    }
    if (preg_match('/\A[\r\n\t[:^cntrl:]]*\z/u', $inputText) === 0) {
      die('不正な入力です。制御文字は使用できません。');
    }
    return $inputText;
  }
}
