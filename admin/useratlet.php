<?php

class User{
    protected $db;
    protected $user_name;
    protected $user_icA;
    protected $user_pass;
    protected $hash_pass;
    
    function __construct($db_connection){
        $this->db = $db_connection;
    }

    

    // LOGIN USER
    function loginUser($user_icA,$user_password){
        
        try{
            $this->user_icA = trim($user_icA);
            $this->user_pass = trim($user_password);

            $find_email = $this->db->prepare("SELECT * FROM `atlet` WHERE atlet_ic = ?");
            $find_email->execute([$this->user_icA]);
            
            if($find_email->rowCount() === 1){
                $row = $find_email->fetch(PDO::FETCH_ASSOC);

                $match_pass = password_verify($this->user_pass,$row['atlet_pass']);
                if($match_pass){
                    $_SESSION = [
                        'user_id' => $row['atlet_id'],
                        'user_icA' => $row['atlet_ic']
                    ];
                    header('Location: Aprofile.php');
                }
                else{
                    return ['errorMessage' => 'Invalid password'];
                }
                
            }
            else{
                return ['errorMessage' => 'Invalid Identity Card !']; 
            }

        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    // FIND USER BY ID
    function find_user_by_id($id){
        try{
            $find_user = $this->db->prepare("SELECT * FROM `atlet` WHERE atlet_id = ?");
			
            $find_user->execute([$id]);
            if($find_user->rowCount() === 1){
                return $find_user->fetch(PDO::FETCH_OBJ);
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
  
}
?>