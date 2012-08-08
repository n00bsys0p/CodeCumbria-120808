<?php
class Person {
    private $id = null;
    protected $fname = null;

    public function getFirstName() {
        return ($this->fname) ? $this->fname : "NULL";
    }

    public function setFirstName($name) {
        $this->fname = $name;
    }

    private function setId($id) {
        $this->id = $id;
    }

    public function findByFirstName($name) {
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=example",
                           'user', 'pass');

            $sth = $dbh->prepare("SELECT *
                                  FROM names
                                  WHERE fname=?
                                  LIMIT 1");
            $sth->bindParam(1, $name);

            $sth->execute();
            
            if(!$sth->rowCount()) {
              return false;
            }

            $row = $sth->fetchObject();

            $this->fname = $row->fname;
            $this->setId($row->id);
            $dbh = NULL;

            return true;
        } catch(PDOException $e) {
           echo $e->getMessage();
        }
    }
}

$person1 = new Person();
if($person1->findByFirstName('Jim')) {
    echo 'Name: ' . $person1->getFirstName();
} else {
    echo "No user with name Jim found";
}

echo '<br />';

$person2 = new Person();
if($person2->findByFirstName('John')) {
    echo 'Name: ' . $person1->getFirstName();
} else {
    echo "No user with name John found";
}

?>
