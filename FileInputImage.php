<?php

namespace soap\jasnybootstrap;

use Yii;
use yii\widgets\InputWidget;
use soap\jasnybootstrap\JasnyBootstrapAsset;
use yii\helpers\Html;

/**
 * FileInputImage generates a jasny image file input
 * @since 2.0
 */
class FileInputImage extends InputWidget
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
    public $selectButtonTitle = 'Select image';

    /**
     * @var text on change file button
     */
    public $changeButtonTitle = 'Change';

    /**
     * @var text on remove file button
     */
    public $removeButtonTitle = 'Remove';

    /**
     * @var bool use holder.js place holder
     */
    public $usePlaceHolder = true;

    /**
     * @var width of preview in pix
     */
    public $previewWidth = '200';

    /**
     * @var width of preview in pix
     */
    public $previewHeight = '150';

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

        $previewClass = 'fileinput-preview';
        if ($this->usePlaceHolder) {
            $previewClass =  'fileinput-new-thumbnail';
            PlaceHolderAsset::register($this->getView());
        }

        $previewParams = [
            'class'=>$previewClass.' thumbnail',
            'data-trigger'=>'fileinput',
        ];
        if ($this->previewWidth and $this->previewHeight) {
            $previewParams['style'] = 'width: '.$this->previewWidth.'px; height: '.$this->previewHeight.'px;';
        }
        return implode("\n", [
            Html::beginTag('div', [
                'class'=>'fileinput fileinput-new fileinput-image',
                'data-provides'=>'fileinput',
            ]),
            Html::beginTag('div', $previewParams),
            Html::tag('img', '', ['data-src' => 'js/holder.js']),
            Html::endTag('div'),
            Html::beginTag('div'),
            Html::beginTag('span', ['class'=>'btn btn-default btn-file']),
            Html::tag('span', $this->selectButtonTitle, ['class'=>'fileinput-new']),
            Html::tag('span', $this->changeButtonTitle, ['class'=>'fileinput-exists']),
            Html::activeFileInput($this->model, $this->attribute, $this->options),
            Html::endTag('span'),
            Html::a($this->removeButtonTitle, '#', [
                'class'=>'btn btn-default fileinput-exists', 
                'data-dismiss'=>'fileinput',
            ]),
            Html::endTag('div'),
            Html::endTag('div'),
        ])."\n";
    }

}
