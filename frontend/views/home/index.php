<?php

/**
 * Team:
 * Coding by 石欣哲 2412896, 20261110
 * This is the home index view of frontend web.
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\widgets\ActiveForm;
use yii\base\DynamicModel;

/* @var $this yii\web\View */

$this->title = '界面基座验收';

$newsRows = [
    ['id' => 1, 'title' => '小组赛抽签结果公布', 'category' => '赛事资讯', 'status' => '已发布'],
    ['id' => 2, 'title' => '揭幕战场馆完成最后调试', 'category' => '场馆动态', 'status' => '已发布'],
    ['id' => 3, 'title' => '球队巡礼：新阵容磨合进行中', 'category' => '球队新闻', 'status' => '草稿'],
];

$dataProvider = new ArrayDataProvider([
    'allModels' => $newsRows,
    'sort' => false,
    'pagination' => false,
]);

$formModel = new DynamicModel(['title', 'email', 'content']);
$formModel->addRule(['title', 'email'], 'required')
    ->addRule('email', 'email')
    ->addRule('content', 'string', ['max' => 200]);
?>
<div class="wc-page">

    <section class="wc-hero wc-section">
        <span class="wc-hero-kicker">STAGE 01 · PUBLIC UI KIT</span>
        <h1>2026 世界杯专题站</h1>
        <p>深海军蓝底色、亮红色点缀与高对比卡片。本页用于验收公共布局、GridView、ActiveForm 等基础组件的深色外观。</p>
        <div class="wc-hero-actions">
            <a class="wc-btn" href="#wc-components">查看组件</a>
            <a class="wc-btn wc-btn-secondary" href="#wc-form">查看表单</a>
        </div>
    </section>

    <section class="wc-section" id="wc-components">
        <h2 class="wc-section-title">配色与文字</h2>
        <div class="wc-grid">
            <div class="wc-card">
                <div class="wc-card-body">
                    <span class="wc-swatch" style="background:#08122b"></span>
                    <h3 class="wc-card-title">深海军蓝</h3>
                    <p class="wc-card-text">页面主背景 #08122b，用于整体底色。</p>
                </div>
            </div>
            <div class="wc-card">
                <div class="wc-card-body">
                    <span class="wc-swatch" style="background:#111f3f"></span>
                    <h3 class="wc-card-title">卡片表面</h3>
                    <p class="wc-card-text">卡片与表单背景 #111f3f，与底色形成层次。</p>
                </div>
            </div>
            <div class="wc-card">
                <div class="wc-card-body">
                    <span class="wc-swatch" style="background:#e63946"></span>
                    <h3 class="wc-card-title">亮红点缀</h3>
                    <p class="wc-card-text">主按钮、强调线与状态标记 #e63946。</p>
                </div>
            </div>
            <div class="wc-card">
                <div class="wc-card-body">
                    <span class="wc-swatch" style="background:#eef3ff"></span>
                    <h3 class="wc-card-title">高对比文字</h3>
                    <p class="wc-card-text">正文 #eef3ff，辅助文字使用 <span class="wc-muted">wc-muted</span>。</p>
                </div>
            </div>
        </div>
    </section>

    <section class="wc-section">
        <h2 class="wc-section-title">卡片与按钮</h2>
        <div class="wc-grid">
            <div class="wc-card">
                <div class="wc-card-body">
                    <h3 class="wc-card-title">公共卡片</h3>
                    <p class="wc-card-text">使用 <code>wc-card</code> 与 <code>wc-card-body</code> 包裹内容，整站卡片风格保持一致。</p>
                    <p><a class="wc-btn wc-btn-sm" href="#wc-components">主按钮</a>
                        <a class="wc-btn wc-btn-secondary wc-btn-sm" href="#wc-components">次按钮</a></p>
                </div>
            </div>
            <div class="wc-card">
                <div class="wc-card-body">
                    <h3 class="wc-card-title">状态徽章</h3>
                    <p class="wc-card-text">
                        <span class="wc-badge">待审核</span>
                        <span class="wc-badge wc-badge-success">已发布</span>
                        <span class="wc-badge wc-badge-muted">草稿</span>
                    </p>
                    <p class="wc-muted">列表、详情页统一使用 wc-badge 显示状态。</p>
                </div>
            </div>
            <div class="wc-card">
                <div class="wc-card-body">
                    <h3 class="wc-card-title">图表容器</h3>
                    <div class="wc-chart">
                        <p class="wc-muted">wc-chart 预留 320px 高度，首页图表由 B 的片段挂载。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wc-section">
        <h2 class="wc-section-title">表格与 GridView</h2>

        <div class="wc-table-wrap" style="margin-bottom:24px">
            <table class="wc-table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>标题</th>
                    <th>分类</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($newsRows as $row): ?>
                    <tr>
                        <td><?= (int) $row['id'] ?></td>
                        <td><?= Html::encode($row['title']) ?></td>
                        <td class="wc-muted"><?= Html::encode($row['category']) ?></td>
                        <td>
                            <span class="wc-badge<?= $row['status'] === '已发布' ? ' wc-badge-success' : ' wc-badge-muted' ?>">
                                <?= Html::encode($row['status']) ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-bordered table-striped'],
            'summary' => '共 {totalCount} 条示例记录',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'title',
                'category',
                [
                    'attribute' => 'status',
                    'format' => 'html',
                    'value' => function ($row) {
                        $class = $row['status'] === '已发布' ? 'wc-badge-success' : 'wc-badge-muted';
                        return Html::tag('span', Html::encode($row['status']), ['class' => 'wc-badge ' . $class]);
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                ],
            ],
        ]) ?>
        <p class="wc-muted">以上为静态演示数据，不查询数据库；操作列仅展示按钮样式。</p>
    </section>

    <section class="wc-section" id="wc-form">
        <h2 class="wc-section-title">表单与 ActiveForm</h2>
        <div class="row">
            <div class="col-md-8">
                <?php $form = ActiveForm::begin([
                    'id' => 'wc-style-form',
                    'action' => Url::to(['/home/index']),
                    'options' => ['class' => 'wc-form'],
                ]); ?>

                <?= $form->field($formModel, 'title')->textInput(['placeholder' => '请输入标题'])->label('标题') ?>
                <?= $form->field($formModel, 'email')->textInput(['placeholder' => 'name@example.com'])->label('邮箱') ?>
                <?= $form->field($formModel, 'content')->textarea(['rows' => 4, 'placeholder' => '请输入内容'])->label('内容') ?>

                <?= Html::submitButton('提交示例', ['class' => 'wc-btn']) ?>
                <?= Html::a('取消', '#', ['class' => 'wc-btn wc-btn-secondary']) ?>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-4">
                <div class="wc-card">
                    <div class="wc-card-body">
                        <h3 class="wc-card-title">表单说明</h3>
                        <p class="wc-card-text">输入框、下拉框、错误提示均已适配深色背景。A/B 直接使用 ActiveForm 即可。</p>
                        <p class="wc-muted">示例表单不写入数据库。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wc-section">
        <h2 class="wc-section-title">提示条</h2>
        <div class="alert alert-success">操作成功提示：新闻已发布。</div>
        <div class="alert alert-info">信息提示：评论需审核后显示。</div>
        <div class="alert alert-warning">注意：赛程数据以管理员录入为准。</div>
    </section>

</div>
