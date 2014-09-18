<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 01.09.14
 * Time: 22:49
 */
abstract class AbstractModel
{
    static protected $table;
    public  $isNew = true;
    public $colums = 0;

    static protected function getDbh() {

        $dsn = 'mysql:dbname=articles;host=localhost';
        try {
            return new Pdo($dsn, 'root', '');
        }catch
        (PDOException $e) {
            echo 'Ошибка';
            echo ($e->getMessage());
            die;
        }


    }

    static public function findAll() {

        $sql = "SELECT * FROM " . static::$table;
        $sth = self::getDbh()->prepare($sql);
        $sth->execute(array(':table'=>static::$table));
        $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $result = $sth->fetchAll();
        if (count($result) == 0){
            throw new Exception ('Нет статьи');
        }
        foreach($result as $el){
            $el->isNew = false;
        }
       // var_dump($result);die;
        return $result;
    }


    static public function findByPk($id) {

        $sql = "SELECT * FROM " . static::$table . " WHERE id_articles=:id";
        $sth = self::getDbh()->prepare($sql);
        $sth->execute(array(':id'=>$id));
        $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $result = $sth->fetch();
        //var_dump($result); die;
        if (count($result) == 0){
            throw new Exception ('Нет статьи');
        }
        $result->isNew = false;
        //var_dump($result) . " <br /> ";
        return $result;
    }

    public function col() {

        $sql = "SELECT COUNT(*) FROM " . static::$table;
        $sth = self::getDbh()->prepare($sql);
        $sth->execute(array(':table'=>static::$table));
       // var_dump($sth);

        $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $result = $sth->fetch();
        //var_dump($result);
        foreach($result as  $el) {
            $this->colTab = $el;

        }
        var_dump($this->colTab) . "<br />";
        if (count($result) == 0){
            throw new Exception ('Нет статьи');
        }
       // var_dump($colums); die;
        return $this->colTab;
  /*          надо посчитать все колонки и вывести в результат
        sql запрос написать для вывода 1 колонки */
    }


    public function save() {

       /* if($this->colTab != 0) {
            $this->isNew = false;
        }*/
       // var_dump($this->isNew);die;
        if($this->isNew) {
            $sql="INSERT INTO ". static::$table ."
            (title, content)
              VALUES (:title, :content)";
            $dbh = self::getDbh();
            $sth = $dbh->prepare($sql);
            $sth->execute(array(':title'=>$this->title, ':content'=>$this->content));
            $this->isNew =false;
            $this->id_articles = $dbh->lastInsertId();
            if (count($sth) == 0){
                throw new Exception ('Нет записи');
            }
            return $sth;
        }

        else {

 //не работает

            $sql="UPDATE ". static::$table ." SET title=:title, content=:content
            WHERE id_articles=:id";
            //var_dump($sql); die;
            $dbh = self::getDbh();
            $sth = $dbh->prepare($sql);
            $sth->execute(array(
            ':title'=>$this->title,
            ':content'=>$this->content,
            ':id'=>$this->id_articles,
            ));
            $this->isNew =false;
            if (count($sth) == 0){
                throw new Exception ('Нет записи');
            }
           // var_dump($sth);die;
            return $sth;
        }
    }

    public function delete($id) {

        $sql="DELETE FROM ". static::$table ." WHERE id_articles=:id";

       //var_dump($sql);

        $dbh = self::getDbh();
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':id'=>$this->id_articles,));
        $sth->isNew =false;
        //var_dump($text);die;
        return $sth;
   }

}



