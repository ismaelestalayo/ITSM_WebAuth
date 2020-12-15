# ITSM_WebAuth

Assignment for the 3rd laboratory of Information Technology Security Methods from the univeristy VGTU from Lithuania.

The webapp is based on the LAMP stack, and lets users log-in through HTTP's Digest mechanism. The hashing is done with the Bcrypt algorythm at a cost of 11, and the MySQL database saves the hashed password, and the result of `md5(user:realm:pass)` to save the HA1 of the Digest authentication implementation.
