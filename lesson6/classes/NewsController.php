
<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 26.08.14
 * Time: 11:22
 */

class NewsController extends AbstractController
{

    protected function allAction() {

        try {
            $allNews = TextTableModel::findAll();
        }catch (Exception $e) {
            echo 'Ошибка нет статей';
            die;
        };
        foreach($allNews as $el){
            foreach($el as $sub){
                $res[] = $sub;
            }

        }
        //var_dump($res); die;
        $view = new View;
        $view -> items = $res;
        $view -> display('allview.php');

    }

    protected function oneAction() {

        $id = $_POST['id'];
        try {
            $allNews = TextTableModel::findByPk($id);
        } catch (Exception $e) {
            echo 'Ошибка нет статей';
            die;
        };
        $view = new View;
        $view -> items = $allNews;
        $view -> display('allview.php');

   }

    public function saveAction() {

        $id = $_POST['id'];
        $content = $_POST['content'];
        $title = $_POST['title'];
        $allNews = new TextTableModel;
        $allNews->col($this->colTab);

        var_dump($allNews);
        if($allNews) {
            echo 'Запись  ';
            $allNews->findByPk($id);
        }
        else {
            echo 'Редактирование  ';
            $allNews = TextTableModel::findByPk($id);
        }
        $allNews->title = $title;
        $allNews->content = $content;
        $allNews->save();
        $view = new View;
        $view -> items = $allNews;
        $view -> display('allview.php');

    }
    public function deleteAction() {

        $id = $_POST['id'];
        $allNews = new TextTableModel;
        $this->allNews= $allNews->findByPk($id);
        $this->allNews->delete($id);
        $view = new View;
        $view -> items = $allNews;
        $view -> display('allview.php');

    }
}