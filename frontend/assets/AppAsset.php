<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    // 这里放 CSS 文件
    public $css = [
        // 注意这里的路径：因为你的文件在 web/statics/ 里面，所以开头要加 statics/
        'statics/vendor/plugins/fullcalendar/fullcalendar.min.css',
        'statics/assets/skin/default_skin/css/theme.css',
        'statics/assets/admin-tools/admin-forms/css/admin-forms.min.css',
    ];
    
    // 这里放 JS 文件（注意顺序：先引入 jQuery，再引入依赖 jQuery 的插件）
    public $js = [
        'statics/vendor/jquery/jquery-1.11.1.min.js',
        'statics/vendor/jquery/jquery_ui/jquery-ui.min.js',
        'statics/vendor/plugins/highcharts/highcharts.js',
        'statics/vendor/plugins/jvectormap/jquery.jvectormap.min.js',
        'statics/vendor/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js',
        'statics/vendor/plugins/fullcalendar/lib/moment.min.js',
        'statics/vendor/plugins/fullcalendar/fullcalendar.min.js',
        'statics/assets/js/utility/utility.js',
        'statics/assets/js/demo/demo.js',
        'statics/assets/js/main.js',
        'statics/assets/js/demo/widgets.js',
    ];
    
    // 依赖关系
    public $depends = [
        // 注意：因为模板自带了自己的 jquery，为了防止冲突，我们把 Yii 自带的 JqueryAsset 注释掉
        // 'yii\web\YiiAsset', 
        'yii\bootstrap\BootstrapAsset',
    ];
}