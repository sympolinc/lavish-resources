<?php

/* 
 * The MIT License
 *
 * Copyright 2014 sympol foundation.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

class Template
{
  var $page;

  function Template($template = "template.html") {
    if (file_exists($template)):
      $this->page = join("", file($template));
    else:
      die("Template file $template not found.");
    endif;
  }

  function parse($file) {
    ob_start();
    include($file);
    $buffer = ob_get_contents();
    ob_end_clean();
    return $buffer;
  }

  function replace_tags($tags = array()) {
    if (sizeof($tags) > 0):
      foreach ($tags as $tag => $data) :
        $data = (file_exists($data)) ? $this->parse($data) : $data;
        $this->page = eregi_replace("{" . $tag . "}", $data,
                      $this->page);
        endforeach;
    else :
      die("No tags designated for replacement.");
    endif;
  }

  function output() {
    echo $this->page;
  }
}