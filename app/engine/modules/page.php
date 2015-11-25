<?php
class Page {

    private $layout = "default";

    public function GetView ($name, $data = array()) {
        require (APP_ROOT."/app/engine/views/".$name.".php");
    }

    public function SetLayout($layout) {
        if($layout) {
            $this->layout = $layout;
        }
    }

    public function Render($data) {

    }

    public function RelativeDate($time) {
        $today = strtotime(date('M j, Y'));
        $reldays = ($time - $today)/86400;
        if ($reldays >= 0 && $reldays < 1) {
            return 'Сегодня';
        } else if ($reldays >= 1 && $reldays < 2) {
            return 'Завтра';
        } else if ($reldays >= -1 && $reldays < 0) {
            return 'Вчера';
        } else return date($time, "d.m.Y");
    }
}
