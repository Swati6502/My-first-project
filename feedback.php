<html>
<head>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css"> 
    <link rel="stylesheet" href="style.css">
    <style>
        form{
            padding: 10px;
            margin-top:120px;
            margin-bottom:150px;
            border-radius:20px;
            padding: 40px 60px;
            font-size: 20px; 

        }
        .input{
            font-size: 16px; 
        }
        a{
            color:white;
        }
        h1{
            color: #f67c92;
            padding-bottom: 16px;
        }
        .result{
            font-size: 15px;
        }
    </style>
</head>

<body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                
            <h1>OCR Analysis Rating System</h1>
                <div>
                    <input class="input" type="text" name="name" placeholder="Username"> 
                </div>
            
                    <div class="rateyo" id= "rating"
                    data-rateyo-rating="4"
                    data-rateyo-num-stars="5"
                    data-rateyo-score="3">
                    </div>
            
                <span class='result'>0</span>
                <input type="hidden" name="rating">

                <button type="submit" class="btn btn-2" name="add">Submit</button> 
                <button ><a href="index.html">Get to the website</a></button>
            

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
       
        </form>
 
<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>
</body>
 
</html>
<?php
    require 'error.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST["name"];
        $rating = $_POST["rating"];
    
        $sql = "INSERT INTO rating (name,rate) VALUES ('$name','$rating')";
        if (mysqli_query($link, $sql))
        {
            echo "New Rate addedddd successfully. Thank You!!";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }
        mysqli_close($link);
    }
?>