<?php

namespace backend\controllers;

use Yii;
use common\models\EdgeCourse;
use common\models\EdgeCourseSearch;
use common\models\EdgeVolunteer;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
use yii\web\UploadedFile;
use common\models\EdgeSlide;
use yii\data\ActiveDataProvider;
use common\models\EdgeGroup;

/**
 * EdgeController implements the CRUD actions for EdgeCourse model.
 */
class EdgeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'studentdelete' => ["post"],
                    'deleteslide' => ["post"],
                    'groupdelete' => ["post"],
                ],
            ],
        ];
    }

    /**
     * Lists all EdgeCourse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EdgeCourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EdgeCourse model.
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
     * Creates a new EdgeCourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EdgeCourse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->course_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EdgeCourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $path = Yii::$app->params["gallerypath"];
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->courseImage = UploadedFile::getInstance($model, "courseImage");
            $model->courseImage->saveAs($path . time().$model->courseImage->baseName . '.' . $model->courseImage->extension);
            $model->courseImage = time().$model->courseImage->baseName . '.' . $model->courseImage->extension;
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->course_id]);
            }
            
        } 
        return $this->render('update', [
            'model' => $model,
        ]);
        
    }

    /**
     * Deletes an existing EdgeCourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 'inactive';
        if($model->save()) {
            return $this->redirect(['index']);
        }
    }

    public function actionVolunteer($id) {
        $count = Yii::$app->db->createCommand("SELECT COUNT(EV.id) FROM edge_volunteer EV INNER JOIN volunteers V ON V.id = EV.reference_id WHERE 1=1 AND course_id=:course_id",[":course_id"=>$id])->queryScalar();
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT EV.id,EV.course_id,V.first_name,V.last_name FROM edge_volunteer EV INNER JOIN volunteers V ON V.id = EV.reference_id WHERE 1=1 AND course_id=:course_id',
            'params' => [':course_id' => $id],
            'totalCount' => $count,
            'sort' => [
                'attributes' => [
                    'name' => [
                        'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                        'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'Name',
                    ],
                    'first_name',
                    'last_name',
                ],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        $models = $dataProvider->getModels();
        $model = EdgeCourse::findOne($id);
        return $this->render('volunteer',["model"=>$dataProvider,"modelData"=>$model]);
    }

    public function actionAddstudent($id) {

        $addModel = new EdgeVolunteer;
        $addModel->course_id = $id;
        if(Yii::$app->request->isPost) {
            
            if(Yii::$app->request->post("enrollStudent") != NULL && count(Yii::$app->request->post("enrollStudent"))) {
                $args = ["EdgeVolunteer" => ["filter"=>FILTER_DEFAULT,"flags"=>FILTER_REQUIRE_ARRAY],"enrollStudent"=>["filter"=>FILTER_VALIDATE_INT,"flags"=>FILTER_REQUIRE_ARRAY]];
                $myVar = filter_input_array(INPUT_POST, $args);
                for($i=0;$i<count($myVar["enrollStudent"]);$i++) {
                    Yii::$app->util->assignStudent($myVar["EdgeVolunteer"]["course_id"],$myVar["enrollStudent"][$i],$addModel);
                }
                Yii::$app->session->setFlash("success", "Student(s) assigned successfully");
                return $this->redirect("/admin/edge/volunteer/$id");
            }
        }
        return $this->render('add_student',["model"=>$addModel]);
    }
    
    public function actionGetstudentforen($id) {
        if(Yii::$app->request->isAjax) {
            $term = Yii::$app->request->getQueryParam("term");
            $student  = Yii::$app->util->getStudentToRegisterInClass($id,$term);
            return \json_encode($student);
        }
    }
    
    public function actionStudentdelete($id) {
        $sID = Yii::$app->request->getQueryParam("sID");
        $model = EdgeVolunteer::findOne($sID);
        if ($model !== null && $model->delete()) {
            Yii::$app->session->setFlash("success", "Student deleted successfully!");
            return $this->redirect(['edge/volunteer/'.$id]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
    
    public function actionSlide($id) {
        $courseModel = EdgeCourse::findOne($id);
        $slideModel = EdgeSlide::find(["course_id"=>$id])->all();
        $dataProvider = new ActiveDataProvider([
            'query' => EdgeSlide::find()->where(["course_id"=>$id,"status"=>"active"]),
            'pagination' =>[
                'pageSize' => 20,
            ]
        ]);
        $posts = $dataProvider->getModels();
        return $this->render("slide",["courseModel"=>$courseModel,"dataProvider"=>$dataProvider]);
    }
    
    public function actionDeleteslide($id) {
        $model = EdgeSlide::findOne($id);
        $model->status = "inactive";
        if($model->save()) {
            return $this->redirect(["slide","id"=>$model->course_id]);
        }
    }
    
    public function actionUpdateslide($id = null) {
        if(is_null($id)) {
            $model = new EdgeSlide();
            $model->course_id = Yii::$app->request->getQueryParam("cID");
        }else {
            $model = EdgeSlide::findOne($id);
        }
        $courseModel = EdgeCourse::findOne(Yii::$app->request->getQueryParam("cID"));
        if(Yii::$app->request->isPost) {
            $model->course_name = $courseModel->name;
            if($model->isNewRecord) {
                $model->slide_order = Yii::$app->util->getSlideOrder($_POST["EdgeSlide"]["course_id"],$_POST["EdgeSlide"]["week"]);
            }
            $model->attributes = $_POST["EdgeSlide"];
            if($model->validate() && $model->save()) {
                Yii::$app->session->setFlash("success", "Slide update successfully!");
                return $this->redirect(["edge/slide/".Yii::$app->request->getQueryParam("cID")]);
            }
        }
        return $this->render("updateslide",["model"=>$model,"courseModel"=>$courseModel]);
    }
    
    public function actionGroup($id) {
        $courseModel = EdgeCourse::findOne($id);
        $dataProvider = new ActiveDataProvider([
           "query" => EdgeGroup::find()->where(["course_id"=>$id,"status"=>"1"]),
            "pagination" => [
                "pageSize" => "20",
            ],
        ]);
        return $this->render("group",["dataProvider"=>$dataProvider,"courseModel"=>$courseModel]);
    }
    
    public function actionGroupadd($id = null) {
        if(is_null($id)) {
            $model = new EdgeGroup();
            $model->course_id = Yii::$app->request->getQueryParam("cID");
        }else {
            $model = EdgeGroup::findOne($id);
        }
        $courseModel = EdgeCourse::findOne(Yii::$app->request->getQueryParam("cID"));
        if(Yii::$app->request->isPost) {
            $model->attributes = $_POST["EdgeGroup"];
            if($model->validate()) {
                if($model->save()) {
                    Yii::$app->session->setFlash("success", "Group added/edited successfully!");
                    return $this->redirect("/admin/edge/group/".Yii::$app->request->getQueryParam("cID"));
                }
            }
        } 
        return $this->render("groupadd",["model"=>$model,"courseModel"=>$courseModel]);
    }
    
    public function actionGroupdelete($id) {
        if(!is_null($id) && Yii::$app->request->isPost) {
            $model = EdgeGroup::findOne($id);
            $model->status = "0";
            if($model && $model->save()) {
                Yii::$app->session->setFlash("success", "Group deleted successfully!");
                return $this->redirect("/admin/edge/group/".$model->course_id);
            }
        }
    }

    /**
     * Finds the EdgeCourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EdgeCourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EdgeCourse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
