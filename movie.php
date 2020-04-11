<?php

    include 'conn.php';
    $query = "SELECT * FROM movieDetail";
    $result = mysqli_query($conn, $query);
    if($result) {   
        $sindex = $tindex = $tpindex = $cindex = $nindex = 0;
        $ssum = $csum = $tsum = $tpsum = $nsum = 0;
        foreach ($result as $key => $value) { 
            $src = '';
            if($value['moviename'] == 'Tanhaji') {
                $src = "/photo/tanhaji.jpeg";   
                $tindex++;
                $tsum = $tsum + $value['rating'];
                $value['totalsum'] = $tsum;
                $value['totalindex'] = $tindex;
            }
            if($value['moviename'] == 'Commando') {
                $src = "/photo/commando.jpeg"; 
                $cindex++;
                $csum = $csum + $value['rating'];
                $value['totalsum'] = $csum;
                $value['totalindex'] = $cindex;
            }
            if($value['moviename'] == 'Thappad') {
                $src = "/photo/thappad.jpeg"; 
                $tpindex++;
                $tpsum = $tpsum + $value['rating'];
                $value['totalsum'] = $tpsum;
                $value['totalindex'] = $tpindex;
            }
            if($value['moviename'] == 'Namaste London') {
                $src = "/photo/namsteL.jpeg"; 
                $nindex++;
                $nsum = $nsum + $value['rating'];
                $value['totalsum'] = $nsum;
                $value['totalindex'] = $nindex; 
            }
            if($value['moviename'] == 'Soryanvanshi') {
                $src = "/photo/soryanvashi.jpeg"; 
                $sindex++;
                $ssum = $ssum + $value['rating'];
                $value['totalsum'] = $ssum;
                $value['totalindex'] = $sindex;
            }         
            $value['src'] = $src; 
            $finaldata[$key]=$value;          
        }
        //  print_r($finaldata);
        foreach($finaldata as $key => $value) {
            if($value['moviename'] == 'Tanhaji' || 'Commando' || 'Soryanvanshi' || 'Namaste London' || 'Thappad') {
                $finaldata[$key]['avgRating'] = $value['totalsum']/ $value['totalindex'];  
                if($value['totalindex'] > 1) {
                    unset($finaldata[$key]);
                }        
            }
        }
       
    } else {
        echo "No data in database.";
    }
   
    $username =  $moviename = $rating = $description = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["username"])) {
            $username = $_POST["username"];
        }
        if(isset($_POST["moviename"])) {
            $moviename = $_POST["moviename"];
        }
        if(isset($_POST["rating"])) {
            $rating = $_POST["rating"];
        }
        if(isset($_POST["description"])) {
            $description = $_POST["description"];
        }
    }

    $errMessage = "";
    if(!empty($username && $moviename && $rating)) {
        $formData = "insert into movieDetail (username, moviename, rating, description) values ('$username','$moviename', '$rating', '$description')";

        if (mysqli_query($conn, $formData)) {
            $errMessage = "New movie data created successfully";
            header("refresh: 2"); 
        } else {
            echo "Error: " . $formData . "<br>" . mysqli_error($conn);
        } 
    } else {   
        $errMessage =  "All fields are mandatory except description."; 
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Movie Rating Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 border-right mt-5"> 
               <p class="text-danger"><?php echo $errMessage; ?></p>
                <h1 class="text-muted">Movie Rating Form</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="username" type="text" name="username" placeholder="Enter user name">
                    </div>
                    <div class="form-group">
                        <label for="moviename">Select Movie </label>
                        <select class="form-control" id="moviename" name="moviename">
                            <option value="" disabled selected>select movie</option>
                            <option value="Namaste London">Namaste London</option>
                            <option value="Thappad">Thappad</option>
                            <option value="Soryanvanshi">Soryanvanshi</option>
                            <option value="Tanhaji">Tanhaji</option>
                            <option value="Commando">Commando</option>               
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rating">Select Rating</label>
                        <select class="form-control" id="rating" name="rating">
                            <option value="" disabled selected>select rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Movie Description</label>
                        <textarea class="form-control" id="description" type="text" name="description" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success" type="submit">
                        Submit
                    </button>
                </form>
            </div>
            <div class="col-md-6 mt-5">
                <h1 class="text-muted ml-5 mt-5">Movie list</h1>
                <?php foreach($finaldata as $key=>$value){ ?>
                    <div class="card mb-2 mt-4 ml-5" style="width: 400px; min-height: 300px">
                        <div class="card-header">
                            <h3><?php echo $value['moviename']; ?></h3>
                        </div>
                        <img class="card-img-top" src="<?php echo $value['src']; ?>" alt="movie image" height="180px" width="100%">
                        <div class="card-body">
                        <h6 class="card-text mt-1"><span class="font-weight-bold">Description: </span> <?php echo $value['description']; ?></h6>
                        <h6 class="mt-2"><span class="font-weight-bold">Average Rating: </span> <?php echo $value['avgRating']; ?></h6>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>