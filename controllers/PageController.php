<?php

namespace mirkhamidov\seo\controllers;

use yii\web\Controller;
use mirkhamidov\seo\models\SeoAttribute;
use mirkhamidov\seo\models\SeoPageAttribute;
use Yii;
use mirkhamidov\seo\models\SeoPage;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for SeoPage model.
 */
class PageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SeoPage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SeoPage::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SeoPage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SeoPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SeoPage();
        
        $pageAttributes = [];
        
        foreach (SeoAttribute::listAll() as $attribute) {
            $modelPageAttribute = new SeoPageAttribute();
            $modelPageAttribute->attribute_id = $attribute['id'];
            $pageAttributes[] = $modelPageAttribute;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            if (SeoPageAttribute::loadMultiple($pageAttributes, Yii::$app->getRequest()->post())) {
                foreach ($pageAttributes as $attribute) {
                    $attribute->page_id = $model->id;
                    if (!empty($attribute->content)) {
                        $attribute->save(false);
                    }
                }
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'pageAttributes' => $pageAttributes,
            ]);
        }
    }

    /**
     * Updates an existing SeoPage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $pageAttributes = [];
    
        // Для каждого атрибута создаем модель
        foreach (SeoAttribute::listAll() as $attribute) {
            $modelOldPageAttribute = SeoPageAttribute::findOne(['page_id' => $id, 'attribute_id' => $attribute['id']]);
            
            $modelPageAttribute = new SeoPageAttribute();
            $modelPageAttribute->attribute_id = $attribute['id'];
            if ($modelOldPageAttribute) {
                $modelPageAttribute->content = $modelOldPageAttribute->content;
            }
            $pageAttributes[] = $modelPageAttribute;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            if (SeoPageAttribute::loadMultiple($pageAttributes, Yii::$app->getRequest()->post())) {
                
                // Удаляем все атрибуты
                SeoPageAttribute::deleteAll('page_id = :id', [':id' => $id]);
                
                // Добавляем новые
                foreach ($pageAttributes as $attribute) {
                    $attribute->page_id = $model->id;
                    
                    // Если атрибут не пустой, сохраняем в БД
                    if (!empty($attribute->content)) {
                        $attribute->save(false);
                    }
                }
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'pageAttributes' => $pageAttributes,
            ]);
        }
    }

    /**
     * Deletes an existing SeoPage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SeoPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SeoPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SeoPage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
