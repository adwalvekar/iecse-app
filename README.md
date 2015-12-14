# IECSE-app
<br><h2>Status Codes</h2>
<br>105			Invalid Input
<br>103			Email not valid
<br>101			Username already exists
<br>111			Successful registration
<br>000			Some error occured, try again.
<br>222			Login successful
<br>200			Invalid Username/Password
<br>504     	Could not connect to database
<br>602			No POST Recieved
<br>604			Could not Find Events
<br>611			Successful find events

<br><h2>Calendar</h2>
<br> The app will respond in this format:
<br>json containig status code at array location 0 and events at subsequent details.
<br>event format:name,date,location,description,imgURL.
<br>POST data to be sent is the month.
<br><h2>Status codes for upload</h2>
<br>101   File not an image
<br>102   File size more than 5mb
<br>104   Error occured
<br>111   Successful upload
