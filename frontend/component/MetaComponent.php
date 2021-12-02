<?php
/**
 * Берёт из настроек сайт описание и страницы и ключевые слова, сохраняет их в глобальных свойствах вьюхи
 */
namespace frontend\component;

use yii\base\Component;

class MetaComponent extends Component
{
    const TYPE_STUDIO = 1;
    const TYPE_TEACHER = 2;
    const TYPE_EVENT = 3;
    const TYPE_MATERIAL = 4;

    public static function setMetaSeo($view, $title, $description, $keywords)
    {
        $view->title = $title;
        $view->registerMetaTag(['name' => 'description', 'content' => $description]);
        $view->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);

    }

    /**
     * @param $view
     * @param $model
     * @param $type
     */
    public static function genMetaSeo($view, $model, $type)
    {
        if (!empty($model->title) && !empty($model->description)) {
            self::setMetaSeo($view, $model->title, $model->description, $model->keywords);
        } else {
            switch ($type) {
                case self::TYPE_STUDIO:
                    $res = self::genSeoStudio($model);
                    self::setMetaSeo($view, $res['title'], $res['description'], $res['keywords']);
                    break;
                case self::TYPE_TEACHER;
                    $res = self::genSeoTeacher($model);
                    self::setMetaSeo($view, $res['title'], $res['description'], $res['keywords']);
                    break;
                case self::TYPE_EVENT:
                    $res = self::genSeoEvent($model);
                    self::setMetaSeo($view, $res['title'], $res['description'], $res['keywords']);
                    break;
                case self::TYPE_MATERIAL:
                    $res = self::genSeoMaterial($model);
                    self::setMetaSeo($view, $res['title'], $res['description'], $res['keywords']);
                    break;

            }
        }

    }

    /**
     * @param $model Studios
     * @return array
     */
    private static function genSeoStudio($model)
    {
        $res = [];
        $res['title'] = $model->name;
        $res['description'] = $model->name . ' в консультационном центре МБДОУ «ЦРР – детский сад №138»';
        $res['keywords'] = $model->keywords;
        return $res;
    }

    /**
     * @param $model Teachers
     * @return array
     */
    private static function genSeoTeacher($model)
    {
        $res = [];
        $res['title'] = $model->surname . ' ' . $model->name . ' ' . $model->lastname . ' - '. $model->position;
        $res['description'] =  $model->position . ' ' . $model->surname . ' ' . $model->name . ' ' . $model->lastname
            . ' в консультационном центре МБДОУ «ЦРР – детский сад №138»';
        $res['keywords'] = $model->keywords;
        return $res;
    }

    /**
     * @param $model Events
     * @return array
     */
    private static function genSeoEvent($model)
    {
        $eventTypeName = $model->eventTypeName;
        $types = $model->type;
        $typesString = '';
        if (!empty($types)) {
            /** @var  $type MaterialTypes */
            foreach ($types as $type) {
                $typesString .= $type->name . ', ';
            }
            $typesString = mb_substr($typesString, 0, -2);
        }
        $ages = $model->age;
        $agesString = '';
        if (!empty($ages)) {
            /** @var  $age AgeTypes */
            foreach ($ages as $age) {
                $agesString .= $age->name . ', ';
            }
            $agesString = mb_substr($agesString, 0, -2);
        }
        $res = [];
        $res['title'] = $eventTypeName . ' по теме: ' . $model->name;
        $res['description'] = $model->name . ' ' . $eventTypeName . ' ' . $typesString . ' ' . $agesString;
        $res['keywords'] = $model->keywords;
        return $res;
    }

    /**
     * @param $model Materials
     * @return array
     */
    private static function genSeoMaterial($model)
    {
        $res = [];
        $res['title'] = $model->name;
        $res['description'] =  mb_substr($model->announce, 0, 170);
        $res['keywords'] = $model->keywords;
        return $res;
    }

}