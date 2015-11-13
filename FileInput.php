<?php

namespace common\widgets;

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
    public $options = ['class' => 'form-control'];

    /**
     * @var boolean whether to include js.
     * If you load this widget by ajax, don't need to include js.
     */
    public $enableClientScript = true;

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
        unset($this->options['class']);
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
            Html::tag('span', Yii::t('common', 'Select file'), ['class'=>'fileinput-new']),
            Html::tag('span', Yii::t('common', 'Change'), ['class'=>'fileinput-exists']),
            Html::activeFileInput($this->model, $this->attribute, $this->options),
            Html::endTag('span'),
            Html::a(Yii::t('common', 'Remove'), '#', [
                'class'=>'input-group-addon btn btn-default fileinput-exists', 
                'data-dismiss'=>'fileinput',
            ]),
            Html::endTag('div'),
        ])."\n";
    }

}
