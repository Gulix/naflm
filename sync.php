<?php

/*
 *  Copyright (c) Nicholas Mossor Rathmann <nicholas.rathmann@gmail.com> 2009. All Rights Reserved.
 *      
 *
 *  This file is part of OBBLM.
 *
 *  OBBLM is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  OBBLM is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *   
 */

define('NO_STARTUP', true); # header.php hint.
require('header.php'); // Includes and constants.
require('lib/class_sqlcore.php');
?>
<html>
<head>
</head>
<body>
<br>
<big>
    <center>
        <b>OBBLM MySQL data synchronisation</b>
    </center>
</big>
<br>
<small>
<?php
if (isset($_POST['proc'])) {
    $conn = mysql_up(true);
    SQLCore::setTriggers(false);
    echo ($result = mysql_query("CALL ".$_POST['proc'])) ? 'OK' : 'Failed: '.mysql_error();
    echo "<br><br>";
    SQLCore::setTriggers(true);
}
?>
MySQL procedure:
<br>
<form method="POST">
    <INPUT TYPE=RADIO NAME="proc" VALUE="syncAll()">syncAll() - may take a few minutes!<br>
    <INPUT TYPE=RADIO NAME="proc" VALUE="syncAllMVs()">syncAllMVs()<br>
    <INPUT TYPE=RADIO NAME="proc" VALUE="syncAllDProps()">syncAllDProps()<br>
    <INPUT TYPE=RADIO NAME="proc" VALUE="syncAllRels()">syncAllRels()<br>
    <input type="submit" name='submit' value="Run">
</form>

</small>
</body>
</html>