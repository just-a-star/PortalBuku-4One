<?php

session_start();
session_destroy();

header("Location: /PortalBuku-4One/index.php");

exit;