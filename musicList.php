<?php
  class musicList {
    private $title;
    private $titleInfo;
    private $musicURL;
    private $prText;

    public function __construct($title, $titleInfo, $musicURL, $prText)  {
      $this->title = $title;
      $this->titleInfo = $titleInfo;
      $this->musicURL = $musicURL;
      $this->prText = $prText;
    }

    public function getTitle (){
      return $this->title;
    }
    public function getTitleInfo(){
      return $this->titleInfo;
    }
    public function getMusicURL(){
      return $this->musicURL;
    }
    public function getPrText(){
      return $this->prText;
    }

    public function setTitle($title){
      $this->title = $title;
    }
    public function setTitleInfo($titleInfo){
      $this->titleInfo = $titleInfo;
    }
  }
