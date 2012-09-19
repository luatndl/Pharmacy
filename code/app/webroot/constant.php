<?php 

/* --- System username (Only one) --- */

if (!defined('SYSTEM_USERNAME')) { define('SYSTEM_USERNAME', 'admin'); }

/* --- System Group --- */

if (!defined('GROUP_SUPERADMIN')) { define('GROUP_SUPERADMIN', 'superadmin'); }
if (!defined('GROUP_USER')) { define('GROUP_USER', 'user'); }
if (!defined('GROUP_NORMAL')) { define('GROUP_NORMAL', 'normal'); }

/* --- Gender --- */

if (!defined('GENDER_FEMALE')) { define('GENDER_FEMALE', 0); }    
if (!defined('GENDER_MALE')) { define('GENDER_MALE', 1); }

?><?php 

// Advertisement type
if (!defined('ADV_LEFT')) { define('ADV_LEFT', 1);}
if (!defined('ADV_RIGHT')) { define('ADV_RIGHT', 2);}
if (!defined('ADV_TOP')) { define('ADV_TOP', 3);}
if (!defined('ADV_MIDDLE')) { define('ADV_MIDDLE', 4);}
if (!defined('ADV_BOTTOM')) { define('ADV_BOTTOM', 5);}

// Advertisement status
if (!defined('ADV_NOT_ACTIVE')) { define('ADV_NOT_ACTIVE', 0);}
if (!defined('ADV_ACTIVE')) { define('ADV_ACTIVE', 1);}

?>