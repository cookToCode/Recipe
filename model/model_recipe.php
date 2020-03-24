<?php 
    include ('db.php');

    //Returns true if user is registered
    //else returns false
    function register($user, $pass){
        global $db;
        $pass=sha1($pass);
        
        $stmt= $db->prepare('INSERT INTO Recipe_Login (username, password) VALUES (:user, :pass);');
        
        $binds = array(
            ":user"=>$user,
            ":pass"=>$pass
        );
        
        if($stmt->execute($binds) && $stmt->rowCount()>0){
            return true;
        }
        else{
            return false;
        }
    }
        
    //Returns username if user exists and password matches
    //else returns false
    function login($user, $pass){
        global $db;
        
        $pass = sha1($pass);
        $stmt = $db->prepare("SELECT username FROM Recipe_Login WHERE username = :user && password = :pass");   
        
        $binds = array(
            ":user"=>$user,
            ":pass"=>$pass
        );
        
        if($stmt->execute($binds) && $stmt->rowCount()>0){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else{
            return false;
        }
    }

    //Pulls the info from Recipe Table
    function getRecipes(){
        global $db;
        
        $stmt=$db->prepare('SELECT * FROM Recipe;');
        
        if($stmt->execute() && $stmt->rowCount()>0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($results);
        }
        else{
            return false;
        }
    }
    
    
    //Pulls the info from Recipe Table
    function getRecipeIngredients($recipeId){
        global $db;
        
        $stmt=$db->prepare('SELECT ingredientName AS "Ingredients", ingredientAmt AS "Amount", measurement AS "Type" FROM Recipe_Ingredients JOIN Recipe ON Recipe_Ingredients.recipeId = Recipe.recipeId WHERE Recipe_Ingredients.recipeId = :recipeId');
        
        $binds=array(
            ":recipeId"=>$recipeId
        );
        
        
        if($stmt->execute($binds) && $stmt->rowCount()>0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($results);
        }
        else{
            return false;
        }
    }
    
    //Pulls the info from Recipe Table
    function getRecipeMethods($recipeId){
        global $db;
        
        $stmt=$db->prepare('SELECT methodOrder AS "Step", methodText AS "Method" FROM Recipe_Method JOIN Recipe ON Recipe_Method.recipeId = Recipe.recipeId WHERE Recipe_Method.recipeId = :recipeId;');
        
        $binds=array(
            ":recipeId"=>$recipeId
        );
        
        
        if($stmt->execute($binds) && $stmt->rowCount()>0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($results);
        }
        else{
            return false;
        }
    }
    
    
?>