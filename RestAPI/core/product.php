<?php 
include_once "function.php";
 /**
  * 
  */
 class Product
 {
 	
 	//db stuff
 	private $conn;
 	private $table= 'products';

 	//product properties
 	public $id;
 	public $warehouse_id;
 	public $warehouse_name;
 	public $name;
 	public $photo;
 	public $stock_balance;
 	public $price;
 	public $description;

 	//constructor with db connection
 	public function __construct($db){
 		$this->conn = $db;
 	}

 	//getting products from database
 	public function get_all_data(){
 		//create query
 		$query = 'SELECT 
 				 w.name as warehouse_name,
 				 p.id,
 				 p.warehouse_id,
 				 p.name,
 				 p.photo,
 				 p.stock_balance,
 				 p.price,
 				 p.description
 				 FROM '. $this->table .' p
 				 LEFT JOIN 
 				 	warehouses w ON p.warehouse_id = w.id';

 		//prepare statement
 		$stmt = $this->conn->prepare($query);
 		//execute query
 		$stmt->execute();
 		return $stmt;
 	}

 	//getting one single products from database
 	public function get_single_data(){
 		//create query
 		$query = 'SELECT 
 				 w.name as warehouse_name,
 				 p.id,
 				 p.warehouse_id,
 				 p.name,
 				 p.photo,
 				 p.stock_balance,
 				 p.price,
 				 p.description
 				 FROM '. $this->table .' p
 				 LEFT JOIN 
 				 	warehouses w ON p.warehouse_id = w.id
 				 WHERE p.id = ? LIMIT 1';

 		//prepare statement
 		$stmt = $this->conn->prepare($query);
 		//binding param
 		$stmt->bindParam(1, $this->id);
 		//execute query
 		$stmt->execute();

 		$row = $stmt->fetch(PDO::FETCH_ASSOC);

 		$this->name 		  = $row['name'];
 		$this->photo 		  = $row['photo'];
 		$this->stock_balance  = $row['stock_balance'];
 		$this->price 		  = $row['price'];
 		$this->description    = $row['description'];
 		$this->warehouse_id	  = $row['warehouse_id'];
 		$this->warehouse_name = $row['warehouse_name'];	
 	}

 	//creating new product to database
 	public function create_data(){
 		
 		//create query
 		$query = 'INSERT INTO '.$this->table.' SET 
 			id 				= :id,
 			warehouse_id 	= :warehouse_id,
 			name 			= :name,
 			photo 			= :photo,
 			stock_balance 	= :stock_balance,
 			price 			= :price,
 			description 	= :description';

 		//prepare statement
 		$stmt = $this->conn->prepare($query);
 		//clean data
 		$this->id 				= clean_input($this->id);
 		$this->warehouse_id 	= clean_input($this->warehouse_id);
 		$this->name 			= clean_input($this->name);
 		$this->photo 			= clean_input($this->photo);
 		$this->stock_balance 	= clean_input($this->stock_balance);
 		$this->price 			= clean_input($this->price);
 		$this->description 		= clean_input($this->description);
 		//binding of parameter
 		$stmt->bindParam(':id', $this->id);
 		$stmt->bindParam(':warehouse_id', $this->warehouse_id);
 		$stmt->bindParam(':name', $this->name);
 		$stmt->bindParam(':photo', $this->photo);
 		$stmt->bindParam(':stock_balance', $this->stock_balance);
 		$stmt->bindParam(':price', $this->price);
 		$stmt->bindParam(':description', $this->description);

 		//execute query
 		if ($stmt->execute()) {
 			return true;
 		}

 		//print error if something goes wrong
 		printf("Error %s. \n", $stmt->error);
 		return false;

 	}


 }

 ?>