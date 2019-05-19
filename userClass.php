<?php  
/**
 * 
 */
class User 
{
  private $name;
  private $color;
  private $id;
  public function __construct($name,$color,$id)
  {
    $this->name = $name;
    $this->color = $color; 
    $this->id = $id;
  }
  public function getName()
  {
      return $this->name;
  }
  public function getColor()
  {
      return $this->color;
  }
  public function getId()
  {
      return $this->id;
  }
  
}

?>