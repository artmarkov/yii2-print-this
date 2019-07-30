<?php

namespace artsoft\printthis;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

class PrintThis extends Widget {

    public $options = [];
    public $htmlOptions = [];
    public $btnIcon = 'fa fa-print';
    public $btnText = '';
    public $btnOptions = ['class' => 'btn btn-default'];

    public function init() {
        parent::init();
    }

    public function run() {

        if (isset($this->htmlOptions['btnOptions'])) {
            $this->btnOptions = $this->htmlOptions['btnOptions'];
        }
        if (isset($this->htmlOptions['btnIcon'])) {
            $this->btnIcon = $this->htmlOptions['btnIcon'];
        }
        if (isset($this->htmlOptions['btnText'])) {
            $this->btnText = $this->htmlOptions['btnText'];
        }
        if (!isset($this->htmlOptions['btnOptions']['id'])) {
            $this->btnOptions['id'] = $this->getId();
        }
        if (isset($this->htmlOptions['id'])) {
            is_array($this->htmlOptions['id']) ? $this->id = $this->getPrintId() : $this->id = $this->getStringId($this->htmlOptions['id']);
        } else {
            throw new \yii\base\InvalidConfigException('Print Error: Missing htmlOptions id!');
        }

        echo Html::a('<i class="' . $this->btnIcon . '"></i> ' . $this->btnText . '', null, $this->btnOptions);
        $this->registerAsset();
        parent::run();
    }

    protected function getPrintId() {
        $string = '';
        foreach ($this->htmlOptions['id'] as $id) {
            $string .= $this->getStringId($id) . ',';
        }
        return substr($string, 0, -1);
    }

    protected function getStringId($id) {
        return '#' . $id;
    }

    protected function registerAsset() {
        PrintThisAsset::register($this->view);


        $jsOptions = Json::encode($this->options);

        $js = "$(\"#" . $this->btnOptions['id'] . "\").click(function(){
              $(\"" . $this->id . "\").printThis(" . $jsOptions . ");
          });
          ";

        $key = __CLASS__ . '#' . $this->id;

        $this->view->registerJs($js, View::POS_READY, $key);
    }

}
