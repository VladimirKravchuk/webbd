<?php

namespace core;

  class Template
  {
      protected $parameters;
      public function __construct()
      {
          $this->parameters = [];
      }
      public function setParam($name, $value)
      {
          $this->parameters[$name] = $value;
      }
      public function setParams($array)
      {
          $this->parameters = array_merge($this->parameters, $array);
      }
      public function getParam($name)
      {
          return $this->parameters[$name];
      }
      public function render($path)
      {
          ob_start();
          extract($this->parameters);
          include($path);
          $str = ob_get_contents();
          ob_end_clean();
          return $str;
      }
      public function display($path)
      {
          echo $this->render($path);
      }
  }