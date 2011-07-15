<?php

class myCriteria extends Criteria {  
      
  private $myOrderByColumns = array();  
  
  /** 
   * Add an ORDER BY FIELD clause. 
   * 
   * @param String $name The field to order by. 
   * @param Array $elements A list to order the elements by. 
   * @return unknown 
   */  
  public function addOrderByField($name, $elements)  
  {  
    $this->myOrderByColumns[] = ' FIELD(' . $name . ', ' . join(", ", $elements) . ')';  
    return $this;  
  }  
  
  public function getOrderByColumns(){  
    return array_merge( $this->myOrderByColumns, parent::getOrderByColumns());  
  }  
}   