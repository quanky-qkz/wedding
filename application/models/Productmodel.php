<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAllProduct()
    {
        $query = $this -> db -> query('SELECT * FROM Products INNER JOIN groups ON groups.Gr_ID = Products.Gr_ID INNER JOIN providers ON products.P_ID = providers.P_ID');  
        return $query->result();
    }

    public function getFeaturedProducts($num)
    {
        $query = $this -> db -> query('SELECT * FROM Products INNER JOIN groups ON groups.Gr_ID = Products.Gr_ID INNER JOIN providers ON products.P_ID = providers.P_ID WHERE isFeatured = 1 ORDER BY RAND() DESC LIMIT ' . $num);  
        return $query->result();
    }

    public function getNewestProducts($num)
    {
        $query = $this -> db -> query('SELECT * FROM Products INNER JOIN groups ON groups.Gr_ID = Products.Gr_ID ORDER BY PRO_ID DESC LIMIT ' . $num);  
        return $query->result();
    }

    public function getMostPopularProducts($num)
    {
        $query = $this -> db -> query('SELECT * FROM Products INNER JOIN groups ON groups.Gr_ID = Products.Gr_ID INNER JOIN providers ON products.P_ID = providers.P_ID ORDER BY Pro_Popularity DESC LIMIT ' . $num);  
        return $query->result();
    }

    public function getAllProductInCategory($id)
    {
        $query = $this -> db -> query('SELECT * FROM Products INNER JOIN groups ON groups.Gr_ID = Products.Gr_ID INNER JOIN providers ON products.P_ID = providers.P_ID WHERE Products.Gr_ID IN (SELECT Gr_ID FROM Groups WHERE Cat_ID =' . $id . ')');  
        return $query->result();
    }

    public function getAllAvailableProductInProvider($id)
    {
        $query = $this -> db -> query('SELECT * FROM Products INNER JOIN groups ON groups.Gr_ID = Products.Gr_ID INNER JOIN providers ON products.P_ID = providers.P_ID WHERE Products.P_ID =  ' . $id );  
        return $query->result();
    }

    public function getAllRelatedProducts($gid, $pid)
    {
        $query = $this -> db -> query('SELECT * FROM Products INNER JOIN groups ON groups.Gr_ID = Products.Gr_ID INNER JOIN providers ON products.P_ID = providers.P_ID WHERE Products.Gr_ID = " .$gid . " AND Products.Pro_ID <> +" . $pid . " ORDER BY RAND() LIMIT 4');  
        return $query->result();
    }

    public function getFirstProduct()
    {
        $query = $this -> db -> query('SELECT * FROM Products INNER JOIN groups ON groups.Gr_ID = Products.Gr_ID INNER JOIN providers ON products.P_ID = providers.P_ID LIMIT 1');  
            return $query->row();
    }

    public function getProductByID($id)
    {
        $query = $this -> db -> query('SELECT * FROM Products INNER JOIN groups ON groups.Gr_ID = Products.Gr_ID INNER JOIN providers ON products.P_ID = providers.P_ID WHERE Pro_ID = ' . $id . ' LIMIT 1');  
        if($query->num_rows() > 0)
            return $query->row();
        return $this->getFirstProduct();
    }

    public function isRated($cus_id, $pro_id)
    {
        $query = $this -> db -> query('SELECT * FROM Customers as c INNER JOIN productrate as p ON c.Cus_ID = p.Cus_ID INNER JOIN products as pr ON p.Pro_ID = pr.Pro_ID WHERE c.Cus_ID = ' .$cus_id . ' AND pr.Pro_ID = ' . $pro_id);  
        if($query->num_rows() > 0)
            return true;
        return false;
    }

    public function addProduct($name, $group, $provider, $price, $quantity, $description, $productImageName)
    {
        $id = -1;
        $data = array(
               'Pro_Name' => $name,
               'P_ID' => $provider,
               'Gr_ID' => $group,
               'Pro_Image' => $productImageName,
               'Pro_Description' => $description,
               'Pro_Quantity' => $quantity,
               'Pro_Price' => $price,
               'Pro_Status' => 1,

            );

        $query = $this -> db -> insert("products", $data);  
        if($query){
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function editProduct($id, $name, $group, $provider, $isFeatured, $price, $quantity, $description, $productImageName, $stt)
    {
        $data = array(
               'Pro_Name' => $name,
               'P_ID' => $provider,
               'Gr_ID' => $group,
               'Pro_Image' => $productImageName,
               'isFeatured' => $isFeatured,
               'Pro_Description' => $description,
               'Pro_Quantity' => $quantity,
               'Pro_Price' => $price,
               'Pro_Status' => $stt,

            );
        $this->db->where("Pro_ID", $id);
        return $this->db->update("products", $data);
    }

    public function getAllAvalableProductBySearchtring($query)
    {
        $query = $this -> db -> query("SELECT * FROM Products INNER JOIN groups ON groups.Gr_ID = Products.Gr_ID INNER JOIN categories ON groups.Cat_ID = categories.Cat_ID INNER JOIN providers ON products.P_ID = providers.P_ID WHERE products.Pro_Name LIKE '%" . $query . "%' OR providers.P_Name LIKE '%" . $query . "%'");  
        return $query->result();
    }

    public function countTotalProduct(){
        $query = $this->db->query("SELECT COUNT(*) as Total FROM Products");
        return $query->row()->Total;
    }

    
}