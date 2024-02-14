<?php
#note: the User.php is going to hold the 
#logic of the application like the CRUD(create, read, update,delete), data manipulation
#arithmetic oparations

    require_once "Database.php"; // strict *check only one time 

    class User extends Database{
        public function store($request){
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            $password = $request['password'];

            #apply hashed algorithm to hashed the password
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);

            #query string
            $sql = "INSERT INTO users(`first_name`, `last_name`,`username`, `password`)
            VALUES('$first_name','$last_name','$username','$password_hashed')";

            #execute the query
            if($this->conn->query($sql)){
                header('location: ../views'); //index.php -> we will create later on
                exit; //same as die()
            }else{
                die("Error creating the user.".$this->conn->error);
            }

      
        }
        public function login($request){
            $username = $request['username'];
            $password = $request['password'];

            #query string to check the username if it exists in the database
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $this->conn->query($sql); //excute the query string

            #check username
            //uf the result of the query is equal to 1, meaning the username exists
            if($result->num_rows == 1){ 
                #check the password
                $user = $result->fetch_assoc();

                # $user = ['id'=>1, 'username' => 'john.smith', 'first_name'=>'John','last_name'=>'Smith','password'=>3456!"$#&%234&$...]

                #check/verify if the password supplied by the user from the login form is the same or equal to the password already in database
                if(password_verify($password, $user['password'])){
                    #if the password is ,matched and vertified, create a SESSION VARIABLE for future use
                    session_start();
                    $_SESSION['id']    = $user['id'];
                    $_SESSION['username']    = $user['username'];
                    $_SESSION['fullname']    = $user['first_name']."".$user['last_name'];

                    header('location: ../views/dashboard.php');
                    exit;  //no need to go else

                }else{
                    die("Password is incorrect.");
                }
            }else{
                die("Username not found.");
            }

         
        }
        public function logout(){
                session_start();
                session_unset(); //remove the session
                session_destroy();  //dalete the session

                header('location: ../views'); //login page
                exit;

        }
    #Retrieve all the users first
    public function getAllUsers(){
        $sql = "SELECT id, first_name, last_name, username, photo FROM users";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving all users:" . $this->conn->error);
        }
    }

    #Retrieve specific user details
    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id= $id";
        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die("Error retrieving the user." .$this->conn->error);
        }
    }

    #Homework
    #move and save the image into the images folder
    public function update($request,$files){
        session_start();
        $id = $_SESSION['id']; //the id of the user who id currently logged-in
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $photo = $files['photo']['name'];
        $tmp_photo = $files['photo']['tmp_name'];  //$tmp_photo-> holds the temporary path(location) of our image

        #query string
        $sql = "UPDATE users SET first_name='$first_name', last_name = '$last_name', username='$username' WHERE id= '$id'";

        #excute the query string
      if($this->conn->query($sql)){
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = "$first_name $last_name";

        #if there is an uploaded photo, save it to the db and save thre file to the images folder
        if($photo){
            $sql = "UPDATE users SET photo = '$photo' WHERE id = '$id'";
          $destination = "../assets/images/$photo";

          #save the image to the db
          if($this->conn->query($sql)){
            #move the images to the images folder
            if(move_uploaded_file($tmp_photo, $destination)){
                header('location: ../views/dashboard.php');
                exit;
            }else{
                die("Error in moving the photo.");
            }
          }else{
            die("Error in uploarding photo.".$this->conn->error);
          }
        }
          header('location: ../views/dashboard.php');
          exit;
        }else{
            die("Error updationg the user.".$this->conn->error);
        }


        }

        public function delete(){
            session_start();
            $id = $_SESSION['id']; //get the id of the user to delete
            $sql = "DELETE FROM users WHERE id='$id'";

            if($this->conn->query($sql)){
                $this->logout();  //call the logout method
            }else{
                die("Error in deleting your account:".$this->conn->error);
            }
        }
        }
      


    
?>