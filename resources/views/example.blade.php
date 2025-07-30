<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Image Upload</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #floor-content {
            display: none; /* Initially hidden */
        }
    </style>
</head>
<body>

    <h2>Project Details</h2>
    <label>Date:</label>
    <input type="text" value="{{ now()->format('Y.m.d') }}" readonly>
    
    <label>Project Name:</label>
    <input type="text" value="Project - 1" readonly>

    <h3>Plan Files</h3>
    <button id="toggle-btn">First</button>
    <button id="toggl-btn">second</button>

    <div id="floor-content">
        <h2>Floor Content</h2>
        <p>Content for Floor ID: 1</p>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label>Front View</label>
                <input type="file" name="front_view">
            </div>

            <div>
                <label>Left Side View</label>
                <input type="file" name="left_view">
            </div>

            <div>
                <label>Right Side View</label>
                <input type="file" name="right_view">
            </div>

            <div>
                <label>Rear View</label>
                <input type="file" name="rear_view">
            </div>

            <button type="submit">Upload</button>
        </form>
    </div>
    <div id="floor-conten">
        <h2>Floor Content</h2>
        <p>Content for Floor ID: 2</p>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label>Front View</label>
                <input type="file" name="front_view">
            </div>

            <div>
                <label>Left Side View</label>
                <input type="file" name="left_view">
            </div>

            <div>
                <label>Right Side View</label>
                <input type="file" name="right_view">
            </div>

            <div>
                <label>Rear View</label>
                <input type="file" name="rear_view">
            </div>

            <button type="submit">Upload</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $("#toggle-btn").click(function(){
                $("#floor-content").toggle(); // Show/hide the floor content
            });
        });
        $(document).ready(function(){
            $("#toggl-btn").click(function(){
                $("#floor-conten").toggle(); // Show/hide the floor content
            });
        });
    </script>

</body>
</html>
