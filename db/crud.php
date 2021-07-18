<?php 
    class crud {
        //private db object
        private $db;
        //contructor to initialize private variable to the db connection
        function __construct($conn){
            $this->db = $conn;
        }
        //function to insert a new record into the attendance db
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO attendance (firstname, lastname, dateofbirth, emailaddress, contactnumber, specialty_id) VALUES(:fname, :lname, :dob, :email, :contact, :specialty)";
                //prepare  the sql statement for execution 
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                //execute statement/declarion 
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        } 


        public function editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty){
            try{
                $sql = "UPDATE `attendance` SET 
                `firstname`=:fname,
                `lastname`=:lname,
                `dateofbirth`=:dob,
                `emailaddress`=:email,
                `contactnumber`=:contact,
                `specialty_id`=:specialty
                WHERE attendee_id = :id ";
                 $stmt = $this->db->prepare($sql);
                 //bind all placeholders to the actual values
                 $stmt->bindparam(':id',$id);
                 $stmt->bindparam(':fname',$fname);
                 $stmt->bindparam(':lname',$lname);
                 $stmt->bindparam(':dob',$dob);
                 $stmt->bindparam(':email',$email);
                 $stmt->bindparam(':contact',$contact);
                 $stmt->bindparam(':specialty',$specialty);
                 //execute statement/declarion 
                 $stmt->execute();
                 return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
                }

            public function getAttendees(){
            try{
            $sql = "SELECT * FROM `attendance` a inner join specialities s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;      
            }
            }

            public function getAttendanceDetails($id){
                try{
                    $sql = "select * from attendance a inner join specialities s on a.specialty_id = s.specialty_id where  attendee_id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id', $id);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;  
                }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;      
                }
         
            }

            public function deleteAttende($id){
                try{
                    $sql = "delete from attendance where attendee_id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id', $id);
                    $stmt->execute();
                    return true;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }

            public function getSpecialities(){
                try{
                    $sql = "SELECT * FROM `specialities`;";
                    $result = $this->db->query($sql);
                    return $result;  
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
           
            }

        
    
}
    

?>