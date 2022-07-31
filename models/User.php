
<?php
class User{
    public $id;
    public $name;
    public $surname;
    public $email;
    public $phone_number;

public function __construct($id, $name, $surname, $email, $phone_number){
    $this->id = $id;
    $this->name = $name;
    $this->surname = $surname;
    $this->email = $email;
    $this->phone_number = $phone_number;
}
public function toString()
{

}

public static function save($conn){
    $stnt = $conn->prepare("INSERT INTO users (name, surname, email, phone_number) VALUES (?,?,?,?)");
    $stnt->bind_param("ssss", $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phoNo'],);
    $stnt->execute();
    $stnt->close();
    $conn->close();
}
}
?>