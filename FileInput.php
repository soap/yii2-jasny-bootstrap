<?php

namespace comdvas\jasnybootstrap;

use Yii;
use yii\widgets\InputWidget;
use comdvas\jasnybootstrap\JasnyBootstrapAsset;
use yii\helpers\Html;

/**
 * FileInput generates a jasny file input
 * @since 2.0
 */
class FileInput extends InputWidget
{
    /**
     * @var array the HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @var boolean whether to include js.
     * If you load this widget by ajax, don't need to include js.
     */
    public $enableClientScript = true;

    /**
     * @var text on select file button
     */
    public $selectButtonTitle = 'Select file';

    /**
     * @var text on change file button
     */
    public $changeButtonTitle = 'Change';

    /**
     * @var text on remove file button
     */
    public $removeButtonTitle = 'Remove';

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run() {
        if ($this->enableClientScript) {
            $view = $this->getView();
            JasnyBootstrapAsset::register($view);
        }
        return implode("\n", [
            Html::beginTag('div', [
                'class'=>'fileinput fileinput-new input-group',
                'data-provides'=>'fileinput',
            ]),
            Html::beginTag('div', ['class'=>'form-control', 'data-trigger'=>'fileinput']),
            Html::tag('i', '', ['class'=>'glyphicon glyphicon-file fileinput-exists']),
            Html::tag('span', '', ['class'=>'fileinput-filename']),
            Html::endTag('div'),
            Html::beginTag('span', ['class'=>'input-group-addon btn btn-default btn-file']),
            Html::tag('span', $this->selectButtonTitle, ['class'=>'fileinput-new']),
            Html::tag('span', $this->changeButtonTitle, ['class'=>'fileinput-exists']),
            Html::activeFileInput($this->model, $this->attribute, $this->options),
            Html::endTag('span'),
            Html::a($this->removeButtonTitle, '#', [
                'class'=>'input-group-addon btn btn-default fileinput-exists', 
                'data-dismiss'=>'fileinput',
            ]),
            Html::endTag('div'),
        ])."\n";
    }

}
