<?php

include __DIR__ . '/Model/model_recipe.php';

session_start();



?>
<html lang="en">
<head>
  <title>Add Recipe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  
</head>

<body>
    
    
<div class="container">
    
    <div class="form-row">
        <input type="text" name="recipeName" placeholder="Recipe Name">
    </div>
    <div class="form-row">
        <div id="ingredientForm">
            
        </div>
        <div>
            <button class="btn btn-primary addIngredient">Add Ingredient</button>
        </div>
        
        <script>
        recipeNumber = 0;
        $(".addIngredient").click(function(){
            $("#ingredientForm").append('<div class="form-row ingredients"><input type="text" class="ingredientName"> <input type="text" class="ingredientAmt"> <input type="text" class="ingredientType"> </div>');
            $(".ingredientName").each(function(){
                console.log($(this).val());
            });
        });
        </script>
    </div>
    <div class="form-row">
        <button class="btn btn-primary">Add Step</button>
    </div>
    
        
   
</div>


</body>
</html>
