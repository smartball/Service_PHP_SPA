<?php
require 'config.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->post('/login','login'); /* User login */
$app->post('/signup','signup'); /* User Signup  */
$app->post('/sellUpload','sellUpload');
$app->get('/getFeed','getFeed'); /* User Feeds  */
$app->post('/feed','feed'); /* User Feeds  */
$app->post('/feedUpdate','feedUpdate'); /* User Feeds  */
$app->post('/feedDelete','feedDelete'); /* User Feeds  */
$app->post('/getImages', 'getImages');
$app->post('/getProduct', 'getProduct');
$app->post('/getImg', 'getImg');
$app->post('/nearBy', 'nearBy');
$app->post('/checkWell', 'checkWell');
$app->post('/checkRoad', 'checkRoad');
$app->post('/checkShape', 'checkShape');
$app->post('/checkWidth', 'checkWidth');
$app->post('/getAmphur', 'getAmphur');
$app->post('/getPolyline', 'getPolyline');


$app->run();

/************************* USER LOGIN *************************************/
/* ### User login ### */
function getPolyline(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        $db = getDB();
        $sql1 = "SELECT * FROM polyLine WHERE PROVINCE_ID = :province AND AMPHUR_CODE = :amphur AND DEED_NUMBER = :deed_number";
        
        $stmt1 = $db->prepare($sql1);
        $stmt1->bindParam("province", $data->province,PDO::PARAM_INT);
        $stmt1->bindParam("amphur", $data->amphur,PDO::PARAM_INT);
        $stmt1->bindParam("deed_number", $data->deed_number,PDO::PARAM_INT);
        $stmt1->execute();
        $mainCount=$stmt1->rowCount();
        $feedData = $stmt1->fetchAll(PDO::FETCH_OBJ);
        
        $db = null;

        if($feedData){
            echo json_encode($feedData, JSON_UNESCAPED_UNICODE);
        }
        
        else{
        echo '{"feedData": ""}';
        }
        
    } catch (PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function getAmphur(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        $db = getDB();
        $sql1 = "SELECT * FROM amphur WHERE PROVINCE_ID = :province";
        
        $stmt1 = $db->prepare($sql1);
        $stmt1->bindParam("province", $data->province,PDO::PARAM_INT);
        $stmt1->execute();
        $mainCount=$stmt1->rowCount();
        $feedData = $stmt1->fetchAll(PDO::FETCH_OBJ);
        
        $db = null;

        if($feedData){
            echo json_encode($feedData, JSON_UNESCAPED_UNICODE);
        }
        
        else{
        echo '{"feedData": ""}';
        }
        
    } catch (PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function checkWell(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        $db = getDB();
        $sql1 = "SELECT * FROM weightfactor WHERE PROVINCE_ID = :province AND AMPHUR_CODE = :amphur AND TYPE = 1";
        
        $stmt1 = $db->prepare($sql1);
        $stmt1->bindParam("province", $data->province,PDO::PARAM_INT);
        $stmt1->bindParam("amphur", $data->amphur,PDO::PARAM_INT);
        $stmt1->execute();
        $mainCount=$stmt1->rowCount();
        $feedData = $stmt1->fetchAll(PDO::FETCH_OBJ);
        
        $db = null;

        if($feedData){
            echo json_encode($feedData, JSON_UNESCAPED_UNICODE);
        }
        
        else{
        echo '{"feedData": ""}';
        }
        
    } catch (PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function checkRoad(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        $db = getDB();
        $sql1 = "SELECT * FROM weightfactor WHERE PROVINCE_ID = :province AND AMPHUR_CODE = :amphur AND TYPE = 2";
        
        $stmt1 = $db->prepare($sql1);
        $stmt1->bindParam("province", $data->province,PDO::PARAM_INT);
        $stmt1->bindParam("amphur", $data->amphur,PDO::PARAM_INT);
        $stmt1->execute();
        $mainCount=$stmt1->rowCount();
        $feedData = $stmt1->fetchAll(PDO::FETCH_OBJ);
        
        $db = null;

        if($feedData){
            echo json_encode($feedData, JSON_UNESCAPED_UNICODE);
        }
        
        else{
        echo '{"feedData": ""}';
        }
        
    } catch (PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function checkShape(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        $db = getDB();
        $sql1 = "SELECT * FROM weightfactor WHERE PROVINCE_ID = :province AND AMPHUR_CODE = :amphur AND TYPE = 3 ORDER BY FACTOR_NAME";
        
        $stmt1 = $db->prepare($sql1);
        $stmt1->bindParam("province", $data->province,PDO::PARAM_INT);
        $stmt1->bindParam("amphur", $data->amphur,PDO::PARAM_INT);
        $stmt1->execute();
        $mainCount=$stmt1->rowCount();
        $feedData = $stmt1->fetchAll(PDO::FETCH_OBJ);
        
        $db = null;

        if($feedData){
            echo json_encode($feedData, JSON_UNESCAPED_UNICODE);
        }
        
        else{
        echo '{"feedData": ""}';
        }
        
    } catch (PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function checkWidth(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        $db = getDB();
        $sql1 = "SELECT * FROM weightfactor WHERE PROVINCE_ID = :province AND AMPHUR_CODE = :amphur AND TYPE = 4";
        
        $stmt1 = $db->prepare($sql1);
        $stmt1->bindParam("province", $data->province,PDO::PARAM_INT);
        $stmt1->bindParam("amphur", $data->amphur,PDO::PARAM_INT);
        $stmt1->execute();
        $mainCount=$stmt1->rowCount();
        $feedData = $stmt1->fetchAll(PDO::FETCH_OBJ);
        
        $db = null;

        if($feedData){
            echo json_encode($feedData, JSON_UNESCAPED_UNICODE);
        }
        
        else{
        echo '{"feedData": ""}';
        }
        
    } catch (PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function nearBy(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    try{
        $db = getDB();
        $sql = "SELECT  NAME , LAT, LNG,( 6373 * acos( cos( radians(:lat) ) 
                * cos( radians( lat ) ) * cos( radians( lng ) - radians(:lng) ) 
                + sin( radians(:lat) ) * sin( radians( lat ) ) ) ) AS distance
                FROM location where TYPE = :type
                having distance < 2";
        $stmt1 = $db->prepare($sql);
        $stmt1->bindParam("lat", $data->lat,PDO::PARAM_STR);
        $stmt1->bindParam("lng", $data->lng,PDO::PARAM_STR);
        $stmt1->bindParam("type", $data->type,PDO::PARAM_STR);
        $stmt1->execute();
        $mainCount=$stmt1->rowCount();
        $feedData = $stmt1->fetchAll(PDO::FETCH_OBJ);
        
        $db = null;

        if($feedData){
            echo json_encode($feedData, JSON_UNESCAPED_UNICODE);
        }
        
        else{
            $myObj->NAME = "สถานที่ใกล้เคียง";
            $myObj->distance = "ไม่มีสถานที่ใกล้เคียง";   
        //$noData = '{"NAME":"สถานที่ใกล้เคียง", "distance":"ไม่มีสถานที่ใกล้เคียง"}';
        echo json_encode($myObj, JSON_UNESCAPED_UNICODE);
        }

    }catch (PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function getProduct(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        $db = getDB();
        $sql1 = "SELECT * FROM detail_item as dt 
                 inner join image_product as img on dt.ID = img.ITEM_ID
                 inner join users as us on dt.USER_ID = us.user_id
                 inner join province as pr on dt.PROVINCE = pr.PROVINCE_ID
                 inner join amphur as am on dt.AMPHUR = am.AMPHUR_CODE
                 inner join property as prop on dt.DEED_NUMBER = prop.DEED_NUMBER WHERE dt.ID = :id ";
        
        $stmt1 = $db->prepare($sql1);
        $stmt1->bindParam("id", $data->id,PDO::PARAM_INT);
        $stmt1->execute();
        $mainCount=$stmt1->rowCount();
        $feedData = $stmt1->fetch(PDO::FETCH_OBJ);
        
        $db = null;

        if($feedData){
            echo json_encode($feedData, JSON_UNESCAPED_UNICODE);
        }
        
        else{
        echo '{"feedData": ""}';
        }
        
    } catch (PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function getImg(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        $db = getDB();
        $sql1 = "SELECT NAME_IMG FROM detail_item as dt 
                 inner join image_item as img on dt.ID = img.ITEM_ID
                 WHERE dt.ID = :id ";
        
        $stmt1 = $db->prepare($sql1);
        $stmt1->bindParam("id", $data->id,PDO::PARAM_INT);
        $stmt1->execute();
        $mainCount=$stmt1->rowCount();
        $feedData = $stmt1->fetchAll(PDO::FETCH_OBJ);
        
        $db = null;

        if($feedData){
            echo json_encode($feedData, JSON_UNESCAPED_UNICODE);
        }
        
        else{
        echo '{"feedData": ""}';
        }
        
    } catch (PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function login() {
    
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        
        $db = getDB();
        $userData ='';
        $sql = "SELECT users.user_id as user_id, users.name as name, users.email as email, users.username as username, img.USER_IMG as NAME_IMG FROM users 
                INNER JOIN imagesData as img on users.user_id = img.USER_ID
                WHERE (users.username=:username or users.email=:username) and users.password=:password ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("username", $data->username, PDO::PARAM_STR);
        $password=hash('sha256',$data->password);
        $stmt->bindParam("password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $mainCount=$stmt->rowCount();
        $userData = $stmt->fetch(PDO::FETCH_OBJ);
        
        if(!empty($userData))
        {
            $user_id=$userData->user_id;
            $userData->token = apiToken($user_id);
        }
        
        $db = null;
         if($userData){
               $userData = json_encode($userData, JSON_UNESCAPED_UNICODE);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Bad request wrong username and password"}}';
            }

           
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


/* ### User registration ### */
function signup() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email=$data->email;
    $name=$data->name;
    $username=$data->username;
    $password=$data->password;
    
    try {
        
        $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
        $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
        
        //echo $email_check.'<br/>'.$email;
        
        if (strlen(trim($username))>0 && strlen(trim($password))>0 && strlen(trim($email))>0 && $email_check>0 && $username_check>0 && $password_check>0)
        {
            //echo 'here';
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM users WHERE username=:username or email=:email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("username", $username,PDO::PARAM_STR);
            $stmt->bindParam("email", $email,PDO::PARAM_STR);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $created=time();
            if($mainCount==0)
            {
                
                /*Inserting user values*/
                $sql1="INSERT INTO users(username,password,email,name)VALUES(:username,:password,:email,:name)";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("username", $username,PDO::PARAM_STR);
                $password=hash('sha256',$data->password);
                $stmt1->bindParam("password", $password,PDO::PARAM_STR);
                $stmt1->bindParam("email", $email,PDO::PARAM_STR);
                $stmt1->bindParam("name", $name,PDO::PARAM_STR);
                $stmt1->execute();
                
                $userData=internalUserDetails($email);
                
            }
            
            $db = null;
         

            if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Enter valid data"}}';
            }

           
        }
        else{
            echo '{"error":{"text":"Enter valid data"}}';
        }
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function sellUpload(){
    $request        = \Slim\Slim::getInstance()->request();
    $data           = json_decode($request->getBody());
    $name           = $data->name;
    $area_size      = $data->area_size;
    $area_appraisal = $data->area_appraisal;
    $dpm_appraisal  = $data->dpm_appraisal;
    $distance       = $data->distance;
    $sell_price     = $data->sell_price;
    $phone          = $data->phone;
    $province       = $data->province;
    $amphur         = $data->amphur;
    $deed_number    = $data->deed_number;
    $road           = $data->road;
    $width          = $data->width;
    $shape          = $data->shape;
    $description    = $data->description;
    $user_id        = $data->user_id;

    try{
        $db = getDB();
        $sql1="INSERT INTO detail_item(
                           NAME, 
                           AREA_SIZE, 
                           AREA_APPRAISAL, 
                           DPM_APPRAISAL, 
                           DISTANCE,
                           SELL_PRICE,
                           PHONE,
                           PROVINCE,
                           AMPHUR,
                           DEED_NUMBER,
                           ROAD,
                           WIDTH,
                           SHAPE,
                           DESCRIPTION,
                           USER_ID )VALUES(
                                        :name,
                                        :area_size,
                                        :area_appraisal,
                                        :dpm_appraisal,
                                        :distance,
                                        :sell_price,
                                        :phone,
                                        :province,
                                        :amphur,
                                        :deed_number,
                                        :road,
                                        :width,
                                        :shape,
                                        :description,
                                        :user_id)";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("name", $name,PDO::PARAM_STR);
                $stmt1->bindParam("area_size", $area_size,PDO::PARAM_STR);
                $stmt1->bindParam("area_appraisal", $area_appraisal,PDO::PARAM_STR);
                $stmt1->bindParam("dpm_appraisal", $dpm_appraisal,PDO::PARAM_STR);
                $stmt1->bindParam("distance", $distance,PDO::PARAM_STR);
                $stmt1->bindParam("sell_price", $sell_price,PDO::PARAM_STR);
                $stmt1->bindParam("phone", $phone,PDO::PARAM_STR);
                $stmt1->bindParam("province", $province,PDO::PARAM_INT);
                $stmt1->bindParam("amphur", $amphur,PDO::PARAM_INT);
                $stmt1->bindParam("deed_number", $deed_number,PDO::PARAM_INT);
                $stmt1->bindParam("road", $road,PDO::PARAM_STR);
                $stmt1->bindParam("width", $width,PDO::PARAM_STR);
                $stmt1->bindParam("shape", $shape,PDO::PARAM_STR);
                $stmt1->bindParam("description", $description,PDO::PARAM_STR);
                $stmt1->bindParam("user_id", $user_id,PDO::PARAM_INT);
                $stmt1->execute();

        $db = null; 
        echo '{"success":{"status":"uploaded"}}';       
                

    }catch(PDOException $e){
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function email() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email=$data->email;

    try {
       
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
       
        if (strlen(trim($email))>0 && $email_check>0)
        {
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM emailUsers WHERE email=:email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("email", $email,PDO::PARAM_STR);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $created=time();
            if($mainCount==0)
            {
                
                /*Inserting user values*/
                $sql1="INSERT INTO emailUsers(email)VALUES(:email)";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("email", $email,PDO::PARAM_STR);
                $stmt1->execute();
                
                
            }
            $userData=internalEmailDetails($email);
            $db = null;
            if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Enter valid dataaaa"}}';
            }
        }
        else{
            echo '{"error":{"text":"Enter valid data"}}';
        }
    }
    
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


/* ### internal Username Details ### */
function internalUserDetails($input) {
    
    try {
        $db = getDB();
        $sql = "SELECT user_id, name, email, username FROM users WHERE username=:input or email=:input";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("input", $input,PDO::PARAM_STR);
        $stmt->execute();
        $usernameDetails = $stmt->fetch(PDO::FETCH_OBJ);
        $usernameDetails->token = apiToken($usernameDetails->user_id);
        $db = null;
        return $usernameDetails;
        
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
    
}

function getFeed(){
  
   
    try {
         
        if(1){
            $feedData = '';
            $db = getDB();
          
                $sql = "SELECT * FROM feed  ORDER BY feed_id DESC LIMIT 15";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
          
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($feedData)
            echo '{"feedData": ' . json_encode($feedData) . '}';
            else
            echo '{"feedData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

function feed(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $lastCreated = $data->lastCreated;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            if($lastCreated){
                $sql = "SELECT * FROM feed WHERE user_id_fk=:user_id AND created < :lastCreated ORDER BY feed_id DESC LIMIT 5";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
            }
            else{
                $sql = "SELECT * FROM feed WHERE user_id_fk=:user_id ORDER BY feed_id DESC LIMIT 5";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            }
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($feedData)
            echo '{"feedData": ' . json_encode($feedData) . '}';
            else
            echo '{"feedData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

function feedUpdate(){

    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $feed=$data->feed;
    
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
         
            
            $feedData = '';
            $db = getDB();
            $sql = "INSERT INTO feed ( feed, created, user_id_fk) VALUES (:feed,:created,:user_id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("feed", $feed, PDO::PARAM_STR);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $created = time();
            $stmt->bindParam("created", $created, PDO::PARAM_INT);
            $stmt->execute();
            


            $sql1 = "SELECT * FROM feed WHERE user_id_fk=:user_id ORDER BY feed_id DESC LIMIT 1";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt1->execute();
            $feedData = $stmt1->fetch(PDO::FETCH_OBJ);


            $db = null;
            echo '{"feedData": ' . json_encode($feedData) . '}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}



function feedDelete(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $feed_id=$data->feed_id;
    
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            $sql = "Delete FROM feed WHERE user_id_fk=:user_id AND feed_id=:feed_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("feed_id", $feed_id, PDO::PARAM_INT);
            $stmt->execute();
            
           
            $db = null;
            echo '{"success":{"text":"Feed deleted"}}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }   
    
}
$app->post('/userImage','userImage'); /* User Details */
function userImage(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $imageB64=$data->imageB64;
    $systemToken=apiToken($user_id);
    try {
        if(1){
            $db = getDB();
            $sql = "INSERT INTO imagesData(b64,user_id_fk) VALUES(:b64,:user_id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("b64", $imageB64, PDO::PARAM_STR);
            $stmt->execute();
            $db = null;
            echo '{"success":{"status":"uploaded"}}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

$app->post('/getImages', 'getImages');
function getImages(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    
    $systemToken=apiToken($user_id);
    try {
        if(1){
            $db = getDB();
            $sql = "SELECT b64 FROM imagesData";
            $stmt = $db->prepare($sql);
           
            $stmt->execute();
            $imageData = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            echo '{"imageData": ' . json_encode($imageData) . '}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
?>
