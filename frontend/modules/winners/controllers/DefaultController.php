<?php

namespace frontend\modules\winners\controllers;

use common\modules\winners\models\WinnersCompetition;
use common\modules\winners\models\WinnersCompetitionType;
use common\modules\winners\models\WinnersYears;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex($year = null)
    {
        $lastYear = WinnersYears::find()->orderBy('year DESC')->one();
        $year = ($year == null ? $lastYear->year : $year);

        $competitions = WinnersCompetition::find()->where(['years' => $year])->orderBy('type_id asc, position asc')->all();

        $types = [];
        foreach ($competitions as $_c) {
            $types[$_c->type_id] = WinnersCompetitionType::findOne($_c->type_id);
        }

        return $this->render('index', [
            'year' => $year,
            'competitions' => $competitions,
            'types' => $types
        ]);
    }
}
