<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Client Form Page</title>
    </head>
    <body>
        <form id="form_11683" class="appnitro"  method="post" action="completed.php">
            <div class="form_description">
                <h2>New Client</h2>
                <p>Sign up for our services</p>
            </div>						
            <ul >

                <li id="li_1" >
                    <label class="description" for="fname">First Name
                    </label>
                    <div>
                        <input required id="fname" name="fname" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_2" >
                    <label class="description" for="lname">Last Name
                    </label>
                    <div>
                        <input required id="lname" name="lname" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_3" >
                    <label class="description" for="email">E-mail
                    </label>
                    <div>
                        <input required id="email" name="email" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_5" >
                    <label class="description" for="pword">Password
                    </label>
                    <div>
                        <input required id="pword" name="pword" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>	
                <li id="li_4" >
                    <label class="description" for="phone">Phone </label>
                    <span>
                        <input required id="phone_1" name="phone_1" class="element text" size="3" maxlength="3" value="" type="text"> -
                        <label for="phone_1">(###)</label>
                    </span>
                    <span>
                        <input required id="phone_2" name="phone_2" class="element text" size="3" maxlength="3" value="" type="text"> -
                        <label for="phone_2">###</label>
                    </span>
                    <span>
                        <input required id="phone_3" name="phone_3" class="element text" size="4" maxlength="4" value="" type="text">
                        <label for="phone_3">####</label>
                    </span>
                </li>
                <li id="li_6" >
                    <label class="description" for="address">Street Address</label>
                    <div>
                        <input required id="address" name="address" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_7" >
                    <label class="description" for="city">City</label>
                    <div>
                        <input required id="city" name="city" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_10" >
                    <label class="description" for="state">State</label>
                    <div>
                        <select class="element select medium" id="state" name="state"> 
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NV">Nevada</option>
                            <option value="NM">New Mexico</option>
                            <option value="OR">Oregon</option>
                            <option value="UT">Utah</option>
                            <option value="WA">Washington</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div> 
                </li>		
                <li id="li_8" >
                    <label class="description" for="zip">Zip Code</label>
                    <div>
                        <input required id="zip" name="zip" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_9" >
                    <label class="description" for="bday">Birthday</label>
                    <span>
                        <input required id="bday_1" name="month" class="element text" size="2" maxlength="2" value="" type="text"> /
                        <label for="bday_1">MM</label>
                    </span>
                    <span>
                        <input required id="bday_2" name="day" class="element text" size="2" maxlength="2" value="" type="text"> /
                        <label for="bday_2">DD</label>
                    </span>
                    <span>
                        <input required id="bday_3" name="year" class="element text" size="4" maxlength="4" value="" type="text">
                        <label for="bday_3">YYYY</label>
                    </span>
                </li>
                <li class="buttons">
                    <input required id="saveForm" class="button_text" type="submit" name="submit" value="Submit" onclick="return validateForm()" />
                </li>
            </ul>
        </form>
        <script>
            const fName = document.getElementById('fname')
            const lName = document.getElementById('lname')
            const email = document.getElementById('email')
            const phone1 = document.getElementById('phone_1')
            const phone2 = document.getElementById('phone_2')
            const phone3 = document.getElementById('phone_3')

            function validateForm() {
                const namePattern = /^[a-zA-Z]+$/
                if (!fName.value.match(namePattern)) {
                    alert('You must enter a valid first name')
                    return false
                }
                if (!lName.value.match(namePattern)) {
                    alert('You must enter a valid last name')
                    return false
                }

                const emailPattern = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
                if (!email.value.match(emailPattern)) {
                    alert('You must enter a valid email')
                    return false
                }

                const phonePattern = /^[0-9]{10}$/
                const phoneNumber = `${phone1.value}${phone2.value}${phone3.value}`
                if (!phoneNumber.match(phonePattern)) {
                    alert('You must enter a valid phone number')
                    return false
                }

                return true
            }
        </script>
    </body>
</html>
