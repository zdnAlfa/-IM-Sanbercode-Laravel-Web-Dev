<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Form</title>
</head>
<body>
    <h1>Sign Up Form</h1>
    
    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        
        <label>First name:</label>
        <input type="text" name="first_name" required><br><br>
        
        <label>Last name:</label>
        <input type="text" name="last_name" required><br><br>
        
        <label>Gender:</label><br>
        <input type="radio" name="gender" value="Male" checked> Male<br>
        <input type="radio" name="gender" value="Female"> Female<br>
        <input type="radio" name="gender" value="Other"> Other<br><br>
        
        <label>Nationality:</label>
        <select name="nationality">
            <option value="Indonesian" selected>Indonesian</option>
        </select><br><br>
        
        <label>Language Spoken:</label><br>
        <input type="checkbox" name="language_spoken[]" value="Bahasa Indonesia" checked> Bahasa Indonesia<br>
        <input type="checkbox" name="language_spoken[]" value="English" checked> English<br>
        <input type="checkbox" name="language_spoken[]" value="Other" checked> Other<br><br>
        
        <label>Bio:</label><br>
        <textarea name="bio" rows="5" cols="30"></textarea><br><br>
        
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>