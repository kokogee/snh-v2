# snh-v2

A FUNCTIONING AUTHENTICATION SYSTEM:
This is an authentication system that has the following;
    - Register
    - Login
    - Logout
    - Dashboard
    - forgot password




*With pending validations on names and emails
    Correct Name (in-view)
        Name should not have numbers
        Name should not be less than 2
        Name should not be blank
    Email (in-view)
        Email must be valid email
        Email must not be empty
        Email must not be less than 5
        Email must have @ and . in it



On Login, the users are redireected to different pages based on their Access Level, 
there are pending validations on User login time and date (in-View)



On Dashboard, 
User Access Level, Department, date of registration, and date of last login should be shown
Super Admin should be able to add other users. (in-view)



- User can reset their password
- The code is refactored to use functions for better codebase
- There's CSS styling to the code using bootstrap



- A patient is able to book an appointment with a Medical Team;
After patient sign in, the patient will see 2 options on their dashboard:
 *Book Appointment
 *Pay Bill leads to a blank page for now
        Book Appointment allows the patient fill a form to book appointment with the medical team.
        Below are the form fields required. I will still add more.
            Date of appointment
            Time of appointment
            Nature of appointment
            Initial complaint
            Department they want to book the appointment for
   
   
   
   
   Then the medical Team member can be able to: (in-View)
        View all appointments in their own department (if no appointment, they should see : "you have no pending appointments")
        They will See patient details with the following (I'll add more)
            Patient Name
            Date of appointment
            Nature of appointment
            initial complaint
    The medical director which is the (super admin) can also do the following: (in-View)
        View all staff and
        View all patients
