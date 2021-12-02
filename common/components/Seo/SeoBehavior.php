<?php
namespace common\components\Seo;


use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;


class SeoBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'saveSeo',
            ActiveRecord::EVENT_AFTER_UPDATE => 'saveSeo',
        ];
    }

    public function getSeo()
    {
        $owner = $this->owner;

        if ( $owner instanceof ActiveRecord ) {
           $seo = $this->findModelSeo();
        } else if ( $owner instanceof \yii\base\Controller ) {
            $seo = $this->findIndexPageSeo();
        }
        if ( is_null( $seo ) ) {
            $seo = new Seo();
        }

        return $seo;
    }

    public function saveSeo( $event )
    {  
        $owner = $this->owner;
        $res = false;

        if ( $owner instanceof ActiveRecord ) {
            $res = $this->saveSeoModel();
        }
    }

    protected function saveSeoModel() 
    {
        $owner = $this->owner;
        $seo = $this->findModelSeo();
        if ( is_null( $seo ) ) {
            $seo = new Seo();
        }

        $seo->load( Yii::$app->request->post() );

        if ( $seo->isNewRecord ) {
            $seo->entity_name = $this->getShortClassName( $owner );
            $seo->entity_id = $owner->primaryKey;
        }

        return $seo->save();
    }

    protected function saveSeoForIndexPage() 
    {
        $seo = $this->findIndexPageSeo();
        if ( is_null( $seo ) ) {
            $seo = new Seo();
        }
        $seo->load( Yii::$app->request->post() );
        $seo->entity_name = $this->getShortClassName( $this->owner );
        $seo->entity_id = 0;

        return $seo->save();
    }

    protected function getShortClassName( $object )
    {
        $fullName = get_class( $object );
        $pattern = "/\w+$/";
        preg_match( $pattern, $fullName, $matches );

        return $matches[0];
    }

    protected function findSeo( $entityId, $entityName )
    {
        return Seo::findOne([
            'entity_id' => $entityId,
            'entity_name' => $entityName
        ]);
    }

    protected function findIndexPageSeo() 
    {
        $owner = $this->owner;

        return $this->findSeo( 0, $this->getShortClassName( $this->owner ) );
    }

    protected function findModelSeo() 
    {
        $owner = $this->owner;

        return $this->findSeo( $owner->primaryKey, $this->getShortClassName( $this->owner ) );
    }
}