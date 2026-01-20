<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Exercises - PHP Introduction</title>
    <link rel="stylesheet" href="/exercises/css/style.css">
</head>
<body>
    <div class="back-link">
        <a href="index.php">&larr; Back to PHP Introduction</a>
        <a href="/examples/01-php-introduction/03-arrays.php">View Example &rarr;</a>
    </div>

    <h1>Arrays Exercises</h1>

    <!-- Exercise 1 -->
    <h2>Exercise 1: Favorite Movies</h2>
    <p>
        <strong>Task:</strong> 
        Create an indexed array with 5 of your favorite movies. Use a for 
        loop to display each movie with its position (e.g., "Movie 1: 
        The Matrix").
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $favMovies = ["The Matrix","Silence of the Lambs","SledgeHammer","Scream","Nope"];
        
        echo "<ol>";
        for($i = 0; $i < count($favMovies); $i++){
            echo "<li>$favMovies[$i]</li>";
        }
        echo"</ol>";
        ?>

    </div>

    <!-- Exercise 2 -->
    <h2>Exercise 2: Student Record</h2>
    <p>
        <strong>Task:</strong> 
        Create an associative array for a student with keys: name, studentId, 
        course, and grade. Display this information in a formatted sentence.
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $studentProfile=[
            "name" => "Rory OB",
            "studentId" => "n00255108",
            "course" => "Creative Computing",
            "grade" => "TBA"
        ];

        echo "Student name: {$studentProfile['name']}<br>
        Student ID: {$studentProfile['studentId']}<br>
        Attending course: {$studentProfile['course']}<br>
        Final grade: {$studentProfile['grade']}<br>";
        ?>
    </div>

    <!-- Exercise 3 -->
    <h2>Exercise 3: Country Capitals</h2>
    <p>
        <strong>Task:</strong> 
        Create an associative array with at least 5 countries as keys and their 
        capitals as values. Use foreach to display each country and capital 
        in the format "The capital of [country] is [capital]."
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $countryCapital= [
            "Ireland" => "Dublin",
            "France" => "Paris",
            "Spain" => "Madrid",
            "Germany" => "Berlin",
            "England" => "London"
        ];

        echo "<ul>";
        foreach ($countryCapital as $country => $capital) {
            echo "<li>$country's capital is $capital</li>";
        }
        echo "</ul>";
        ?>
    </div>

    <!-- Exercise 4 -->
    <h2>Exercise 4: Menu Categories</h2>
    <p>
        <strong>Task:</strong> 
        Create a nested array representing a restaurant menu with at least 
        2 categories (e.g., "Starters", "Main Course"). Each category should 
        have at least 3 items with prices. Display the menu in an organized 
        format.
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $menu =[
            'Starter' =>[
                'salad' => 3,
                'soup' => 5,
                'sandwich' => 4
            ],
            'Main' =>[
                'burger' => 10,
                'wrap' => 9,
                'roast' => 12   
            ]
        ];
        foreach ($menu as $course => $items) {
            echo "<p>" . ucfirst($course) . " course:</p>";
            echo "<ul>";
            foreach ($items as $key => $value) {
                echo "<li>$key\t($value)</li>";
            }
            echo "</ul>";
        }

        ?>
    </div>

</body>
</html>
