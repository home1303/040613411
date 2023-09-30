<html>
<head><meta charset="UTF-8"></head>
<body>
    
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

<form action="WS7.php" method="post">
Username : <input type="text" name="username"><br>
Password : <input type="text" name="password" class="form-control" placeholder="Password" ><br>
Name : <input type="text" name="name"><br>
mobile : <input type="tel" name="mobile"><br>
email : <input type="email" name="email"><br>
address : <br>
<textarea name="address" rows="3" cols="40"></textarea><br>
Image: <input type="file" name="img"><br>
<input type="submit" value="เพิ่มuser ">
</form>
</body>
</html>