PrintThis for Yii2

forked from Yii2Assets/yii2-print-this

---
Install
-----
composer require artsoft/yii2-print-this "dev-master"
or add this line to composer.json
"artsoft/yii2-print-this": "dev-master"

Usage
-----
To use this widget, insert the following code into a view file:
```php
<?php
echo PrintThis::widget([
	'htmlOptions' => [
            'id' => ['print_info', 'print_body'],
            'btnOptions' => [
                'class' => 'btn btn-default btn-sm',
                'data-toggle' => 'tooltip',
                'data-container' => 'body',
                'data-placement' => 'top',
                'data-original-title' => 'Print',
            ]
            'btnText' => 'Print',
            'btnIcon' => 'fa fa-print'
        ],
	'options' => [
		'debug' => false,
		'importCSS' => true,
		'importStyle' => false,
		'loadCSS' => "path/to/my.css",
		'pageTitle' => "",
		'removeInline' => false,
		'printDelay' => 333,
		'header' => null,
		'formValues' => true,
	]
]);
?>
---
More option
----
https://github.com/jasonday/printThis

in view file for print area
```html
<div id="PrintThis_1">
Your Html code here
</div>
...
<div id="PrintThis_2">
Your Html code here
</div>
```

you can add css for disable link display
```css
@media print {
    .noprint {display:none !important;}
    a:link:after, a:visited:after {  
      display: none;
      content: "";    
    }
}
```
