<?php

session_start();
session_destroy();

header("Location: /4One/PortalBuku-4One/index.php");

exit;