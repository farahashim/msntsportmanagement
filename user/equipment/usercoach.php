<?php

class User{
    protected $db;
    protected $user_name;
    protected $user_icC;
    protected $user_pass;
    protected $hash_pass;
    
    function __construct($db_connection){
        $this->db = $db_connection;
    }

    

    // LOGIN USER
    function loginUser($user_icC,$user_password){
        
        try{
            $this->user_icC = trim($user_icC);
            $this->user_pass = trim($user_password);

            $find_email = $this->db->prepare("SELECT * FROM `coach` WHERE coach_ic = ?");
            $find_email->execute([$this->user_icC]);
            
            if($find_email->rowCount() === 1){
                $row = $find_email->fetch(PDO::FETCH_ASSOC);

                $match_pass = password_verify($this->user_pass,$row['coach_pass']);
                if($match_pass){
                    $_SESSION = [
                        'user_id' => $row['coach_id'],
                        'user_icC' => $row['coach_ic']
                    ];
                    header('Location: Cprofile.php');
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
            $find_user = $this->db->prepare("SELECT * FROM `coach` WHERE coach_id = ?");
			
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