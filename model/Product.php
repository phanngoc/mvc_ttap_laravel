<?php

class Product 
{
	private $db;

	public function __construct()
	{
        global $db;
		$this->db = $db;
	}
    
    public function getAll()
    {
        $result = $this->db->select('product')->all();
        return $result;
    }    

    public function getProduct($id)
    {
        $product = $this->db->read( 'product', $id )->fetch();
        return $product;
    }

    public function addProduct($name,$price,$description)
    {
        $this->db->create('product', 
                array( 
                    'name' => $name,
                    'price'=>$price,
                    'description'=>$description,
                ) 
        );
    }

    public function updateProduct($id,$name,$price,$description)
    {
        $product = array('name'=>$name,'price'=>$price,'description'=>$description);
        $this->db->update('product', $product, $id);
    }

    public function deleteProduct($id)
    {
        $this->db->delete('product',$id);
    }

}