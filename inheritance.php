<?php

require_once('person.php');

// Student and tutor both inherit from Person
class Student extends Person {
    private $grades = array();

    public function Student($name, $grade_ary) {
        $this->setFName($name);
        $this->grades = $grade_ary;
    }

    public function setGrades($grade_ary) {
        $this->grades = $grade_ary;
    }

    // Polymorphic function changes what
    // setFirstName does for Student without
    // affecting how Person works
    public function setFirstName($name) {
        $this->setFName($name);
    }

    private function setFName($name) {
        $this->fname = $name . ' (' . get_class($this) . ')';
    }
}

class Tutor extends Person {
    private $classes = array();

    public function Tutor($name, $class_ary) {
      $this->setFName($name);
      $this->classes = $class_ary;
    }

    public function setFirstName($name) {
       $this->setFName($name);
    }

    public function getClasses() {
        return $this->classes;
    }

    private function setFName($name) {
        $this->fname = $name . ' - ' . get_class($this);
    }
}

// Prove the polymorphism by calling a member function
function setName(Person $person, $name) {
    $person->setFirstName($name);
}

function showDetail(Person $person) {
    $name = $person->getFirstName();

    return "This person's name is $name";
}

// Test the inheritance/polymorphism
$s1 = new Student('Dave', array('English' => 74,
                                'Maths' => 46,
                                'Science' => 65));

$t1 = new Tutor('Mike', array('Maths', 'Science'));

$t2 = new Tutor('Chris', array('English', 'History'));

setName($s1, 'Peter');
setName($t2, 'Mike');

echo '<br />';
echo showDetail($s1);
echo '<br />';
echo showDetail($t1);
echo '<br />';
echo showDetail($t2);

?>
